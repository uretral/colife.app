<?php


namespace Modules\Lk\Repositories;


use App\Services\Amplitude\Handle\AmplitudeLanguageChosen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Modules\Lk\Data\User\OnUserDeleteData;
use Modules\Lk\Data\User\UserNotificationCountsData;
use Modules\Lk\Entities\User;
use App\Services\User\Data\UserData;
use Illuminate\Support\Facades\Hash;
use Modules\Lk\Events\ProfileUpdatedEvent;
use Modules\Lk\Helpers\TenantHelper;
use Modules\Lk\Jobs\Amplitude\AmplitudeLanguageChosenJob;
use Spatie\LaravelData\DataCollection;

class UserRepository extends AbstractRepository
{
    protected function getModel()
    {
        return User::class;
    }

    public function __construct()
    {
        parent::__construct();

        $this->init();
    }

    public static function findByEmail($email)
    {
        $model = new self();
        return $model->startConditions()->where("email", $email)->first();
    }

    public static function createUser(UserData $dto, $avatarFile = false): User
    {
        $userModel = User::updateOrCreate(
            [
                'email' => $dto->email
            ],
            [
                'name'         => $dto->name,
                'locale'       => 'ru',
                'country_code' => $dto->country_code,
                'bx_id'        => $dto->bx_id ?? null,
                'email'        => $dto->email,
                'password'     => Hash::make($dto->password),
            ]
        );

        if ($avatarFile) {
            TenantHelper::updateUserAvatar($avatarFile, $userModel);
        }

        return self::assignRole($userModel, $dto->roles);
    }

    public static function assignRole(User $user, DataCollection $roles): User
    {
        $roles = $roles->toArray() ?? [];
        return $user->assignRole($roles);
    }

    public static function getAuthId()
    {
        return auth()->guard('lk')?->user()?->id ?? false;
    }

    public static function getAuthUser()
    {
        return auth()->guard('lk')->user();
    }

    public static function getAuthUserCountryCode()
    {
        return auth()->guard('lk')->user()?->country_code;
    }

    public static function deleteUser($reasonId, $reasonText = '', $userId = false): bool
    {
        $user = !empty($userId)
            ? User::findOrFail($userId)
            : self::getAuthUser();

        $dto = OnUserDeleteData::from(compact("reasonId", "reasonText"));
        $result = $user->update($dto->toArray());
        event(new ProfileUpdatedEvent($user->id));
        return $result;
    }

    public static function hasNotifications($userId = false): bool|string
    {
        if (!$notifications = self::getNotificationsCounts($userId)) {
            return false;
        }

        if ($notifications->chats > 0) {
            return route('lk.chat');
        }

        if ($notifications->appeals > 0) {
            return route('lk.appeal');
        }
        return false;
    }

    public static function getNotificationsCounts(?int $userId = null): ?UserNotificationCountsData
    {
        $userId = $userId ?: self::getAuthId();

        $query = "SELECT
        (SELECT COUNT(CASE WHEN cm.`read` = 0 THEN 1 ELSE NULL END) AS chats
        FROM chats c
        JOIN chat_users cu ON c.id = cu.chat_id
        JOIN chat_messages cm ON c.id = cm.chat_id
        JOIN users u ON u.id = cu.user_id
        WHERE u.id = :userId) AS chats,
        (SELECT COUNT(CASE WHEN am.`read` = 0 THEN 1 ELSE NULL END) AS appeals
        FROM appeals a
        JOIN appeal_users au ON a.id = au.appeal_id
        JOIN appeal_messages am ON a.id = am.appeal_id
        JOIN users u ON u.id = au.user_id
        WHERE u.id = :userId2) AS appeals";

        $notifications = collect(
            DB::connection("tenant")
                ->select($query, ['userId' => $userId, 'userId2' => $userId])
        );

        return $notifications
            ? UserNotificationCountsData::from($notifications->first())
            : null;
    }

    public function setLocale($locale): RedirectResponse
    {
        session(['locale' => $locale]);
        self::getAuthUser()->update(['locale' => $locale]);

        /* Событие Amplitude - Выбор языка */
        AmplitudeLanguageChosenJob::dispatch();

        return redirect()->back();
    }

}
