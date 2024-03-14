<?php


namespace Modules\My\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\My\Data\User\OnUserDeleteData;
use Modules\My\Data\User\UserNotificationCountsData;
use Modules\My\Entities\User;
use Modules\My\Data\User\UserData;
use Illuminate\Support\Facades\Hash;
use Modules\My\Events\ProfileUpdatedEvent;
use Modules\My\Helpers\UserHelper;
use Modules\My\Services\UserService;
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

    public static function findByBxId($contactId)
    {
        $model = new self();
        return $model->startConditions()->where("bx_id", $contactId)->first();
    }

    public static function createUser(UserData $dto, $avatarFile = false): User
    {
        try {
            $userModel = User::updateOrCreate(
                [
                    'email' => $dto->email
                ],
                [
                    'name' => $dto->name,
                    'locale' => 'ru',
                    'country_code' => $dto->country_code ?? app()->getLocale(),
                    'bx_id' => $dto->bx_id ?? null,
                    'email' => $dto->email,
                    'password' => Hash::make($dto->password),
                ]
            );

            if ($avatarFile) {
                UserHelper::updateUserAvatar($avatarFile, $userModel);
            }

            return self::assignRole($userModel, $dto->roles);

        } catch (\Exception $e) {
            throw new \Exception(self::class . ' Ошибка создания пользователя или его атрибутов: ' . $e->getMessage());
        }

    }

    public static function assignRole(User $user, DataCollection $roles): User
    {
        $roles = $roles->toArray() ?? [];
        return $user->assignRole($roles);
    }

    public static function getAuthId()
    {
        return auth()->guard('my')?->user()?->id ?? false;
    }

    public static function getAuthUser(): User|Authenticatable|null
    {
        return auth()->guard('my')->user();
    }

    public static function getAuthUserCountryCode()
    {
        return auth()->guard('my')->user()?->country_code;
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

        if ($notifications->requests > 0) {
            return route('my.request');
        }

        if ($notifications->appeals > 0) {
            return route('my.appeal');
        }
        return false;
    }

    public static function getNotificationsCounts(?int $userId = null): ?UserNotificationCountsData
    {
        $userId = $userId ?: self::getAuthId();

        $query = "SELECT
        (SELECT COUNT(CASE WHEN rm.`read` = 0 THEN 1 ELSE NULL END) AS requests
        FROM requests r
        JOIN request_users ru ON r.id = ru.request_id
        JOIN request_messages rm ON r.id = rm.request_id
        JOIN users u ON u.id = ru.user_id
        WHERE u.id = :userId) AS requests,
        (SELECT COUNT(CASE WHEN am.`read` = 0 THEN 1 ELSE NULL END) AS appeals
        FROM appeals a
        JOIN appeal_users au ON a.id = au.appeal_id
        JOIN appeal_messages am ON a.id = am.appeal_id
        JOIN users u ON u.id = au.user_id
        WHERE u.id = :userId2) AS appeals";

        $notifications = collect(
            DB::connection("my")
                ->select($query, ['userId' => $userId, 'userId2' => $userId])
        );

        Log::channel('my')->info('Непрочитано', ['userId' => $userId, 'notifications' => $notifications->first(),]);

        return $notifications
            ? UserNotificationCountsData::from($notifications->first())
            : null;
    }

    public function setLocale($locale): RedirectResponse
    {
        session(['locale' => $locale]);
        self::getAuthUser()->update(['locale' => $locale]);

        return redirect()->back();
    }

    public static function getUserAttributes()
    {
        return auth()->guard('my')->user()?->attributes;
    }

    public static function getUserContact()
    {
        return auth()->guard('my')->user()?->contact;
    }

    public static function getUserContacts()
    {
        return auth()->guard('my')->user()?->contacts;
    }

    public static function getUserCurrency(): string
    {
        $code = self::getAuthUserCountryCode();
        return html_entity_decode(config("admin.extensions.multi-language.countries.{$code}.currency")) ;
    }

}
