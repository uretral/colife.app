<?php


namespace Modules\My\Services;


use App\Helpers\Helper;

use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\User\ApiUserAttributesData;
use Modules\My\Data\User\BitrixUserHashData;
use Modules\My\Entities\UserAttributes;
use Modules\My\Entities\UserChatAttributes;
use Modules\My\Events\UserEmailConfirmedEvent;
use Modules\My\Repositories\UserRepository;
use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\Mappers\BitrixUserAttributesData;
use App\Services\Bitrix\Data\SiteUser\FollowByBitrixLinkData;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Modules\My\Data\User\ChatUserAttributesData;
use Modules\My\Data\User\RoleData;
use Modules\My\Data\User\UserAttributesData;
use Illuminate\Http\Request;
use Modules\My\Entities\User;

class UserService
{

    public static function registerByHashedLink(Request $request)
    {
        $data = (object)[];
        $decodedData = BitrixHelper::decodeAuthUrl(urlencode($request->bitrix ?? ''));
        if (!$dto = BitrixUserHashData::from($decodedData ?? [])) {
            return $data;
        }

        // Событие, что пользователь прошел по ссылке
        if (!empty($dto->contactId)) {
            @event(new UserEmailConfirmedEvent($dto->contactId));
        }

        // Пользователь уже зарегистрирован под таким email
        if (UserRepository::findByEmail($dto->email)) {
            return redirect('login')
                ->withErrors(["email" => 'Вы уже зарегистрированы: ' . $dto->email]);
        }

        return $dto;
    }


    public function assignRole(RoleData $data, User $user): void
    {
        $roles = $data->roles ?? [];
        $user->assignRole($roles);
    }

    /**
     * Начальные атрибуты из данных Битрикса и атрибуты для чата
     * @return bool
     * @throws \Exception
     */
    public static function createUserAttributes(User $user)
    {
        try {

            if (!$user->bx_id || !$user->id)
                throw new \Exception("Нет BxId или ошибка получения ID пользователя");

            if (!$contact = app(CrmMyApi::class)->profileGet($user->bx_id))
                throw new \Exception("Ошибка получения Bitrix Контакта по API (МОСТ)");

            $apiUserAttributes = ApiUserAttributesData::from($contact);
            $apiUserAttributes->user_id = $user->id;

            UserAttributes::updateOrCreate(
                [
                    "user_id" => $user->id
                ],
                $apiUserAttributes->toArray()
            );

            return true;

        } catch (\Exception $e){
            throw new \Exception("Ошибка создания атрибутов пользователя: {$user->id}" .PHP_EOL
                . $e->getMessage()
                . $e->getFile()
                . $e->getLine()
            );
        }
    }

}
