<?php

namespace Modules\CrmApi\Contracts\Implementations;

use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\Tenant\BitrixTenantProfileData;
use Modules\CrmApi\Api\Contact\GetContact;
use Modules\CrmApi\Api\Notice\GetNotice;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\CrmApi\Data\Responses\ApiAppealCreatedData;

class LkBridgeApi extends CrmLkApi
{

    public function __construct(protected BitrixService $api) {}

    public function profileGet(int $tenantId)
    {
        $data = ['code' => auth()->guard('tenant')->user()?->country_code];
        return app(GetContact::class)->request($data,$tenantId)?->data ?? [];
    }

    public function profileUpdate(array $user)
    {
//        $profile = BitrixTenantProfileData::from($user);
//        return app(UpdateTenantProfile::class)->request($profile->toArray(),$profile->bx_id);
    }

    public function profileDelete(int $contactId, string $reason, string $countryCode)
    {
        // TODO: Implement profileDelete() method.
    }

    public function paymentsGet(int $contactId, string $countryCode)
    {
        // TODO: Implement paymentsGet() method.
    }

    public function paymentsCreate(array $payload)
    {
        // TODO: Implement paymentsCreate() method.
    }

    public function paymentHistory(int $contactId, string $countryCode)
    {
        // TODO: Implement paymentHistory() method.
    }

    public function isRegistered(int $contactId, string $countryCode)
    {
        // TODO: Implement isRegistered() method.
    }

    public function emailConfirmed(int $contactId, string $countryCode)
    {
        // TODO: Implement emailConfirmed() method.
    }

    public function appealCreate(array $data, string $countryCode): ApiAppealCreatedData
    {
        // TODO: Implement appealCreate() method.
    }

    public function appealMessageCreate(array $payload, $id, string $countryCode)
    {
        // TODO: Implement appealMessageCreate() method.
    }

    public function appealRated(array $payload, string $countryCode)
    {
        // TODO: Implement appealRated() method.
    }

    public function chatMessageCreated(array $payload, string $countryCode)
    {
        // TODO: Implement chatMessageCreated() method.
    }

    public function chatCreate(int $contactId, string $countryCode)
    {
        // TODO: Implement chatCreate() method.
    }

    public function noticeGet(int $contactId, string $countryCode)
    {
        $data = ['code' => $countryCode];
        return  app(GetNotice::class)->request($data,$contactId);
    }

    public function documentGet(int $contactId, string $countryCode)
    {
        // TODO: Implement documentGet() method.
    }
}
