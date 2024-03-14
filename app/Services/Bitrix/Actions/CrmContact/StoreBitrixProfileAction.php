<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Data\Tenant\BitrixTenantProfileData;
use App\Services\Bitrix\Enum\BitrixContactFieldsEnum;
use App\Services\Bitrix\Enum\BitrixNotificationTypeEnum;
use App\Services\Bitrix24\Entity\ContactEntity;
use Illuminate\Support\Facades\Log;

/**
 * @package App\Services\Bitrix\Actions\CrmContact
 */
class StoreBitrixProfileAction extends AbstractBitrixGetAction
{

    public function run(BitrixTenantProfileData $user)
    {
        try {
            $api = new ContactEntity($this->bitrix);
            $response = $api->update(
                $user->bx_id,
                [
                    BitrixContactFieldsEnum::ABOUT()->value => $user->attributes->about ?? '',
                    BitrixContactFieldsEnum::POSITION()->value => $user->attributes->position ?? '',
                    BitrixContactFieldsEnum::INTERESTS()->value => $user->attributes->interests ?? '',

                    BitrixContactFieldsEnum::IM_VK()->value => $user->attributes->vkontakte ?? '',
                    BitrixContactFieldsEnum::IM_FACEBOOK()->value => $user->attributes->facebook ?? '',
                    BitrixContactFieldsEnum::IM_INSTAGRAM()->value => $user->attributes->instagram ?? '',
                    BitrixContactFieldsEnum::IM_TELEGRAM()->value => $user->attributes->telegram ?? '',

                    BitrixContactFieldsEnum::CLEANING()->value => $user->attributes->cleaning ? "Y" : "N",
                    BitrixContactFieldsEnum::MASTER()->value => $user->attributes->master ? "Y" : "N",
                    BitrixContactFieldsEnum::NOTIFICATION_TYPES()->value => self::getNotificationTypes($user),

                    BitrixContactFieldsEnum::IS_DELETED()->value => $user->isDeleted,
                    BitrixContactFieldsEnum::DELETE_REASON()->value => $user->delete_reason,
                ]
            );

            if (empty($response['result'])) {
                throw new \Exception($this::class . 'Ошибка обновления Контакта: ' . $user->bx_id);
            }

            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    protected function getNotificationTypes($user): array
    {
        return !$user->attributes->email_notification && !$user->attributes->sms_notification
            ? [BitrixNotificationTypeEnum::EMPTY()->value]
            : [
                !empty($user->attributes->email_notification) ? BitrixNotificationTypeEnum::EMAIL()->value : null,
                !empty($user->attributes->sms_notification) ? BitrixNotificationTypeEnum::SMS()->value : null,
            ];
    }

}
