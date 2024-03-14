<?php


namespace Modules\CrmApi\Contracts;


use Modules\CrmApi\Data\Responses\ApiAppealCreatedData;

abstract class CrmLkApi implements CrmApi
{

/*    abstract public function profileGet(int $contactId, int $tenantId);

    abstract public function profileUpdate(array $user);

    abstract public function profileDelete(int $contactId, string $reason);

    abstract public function paymentsGet(int $contactId);

    abstract public function isRegistered(int $contactId);

    abstract public function emailConfirmed(int $contactId);

    abstract public function appealCreate(array $data):ApiAppealCreatedData;

    abstract public function appealMessageCreate(array $payload, $id);

    abstract public function appealRated(array $payload);

    abstract public function chatMessageCreated(array $payload);

    abstract public function noticeGet(int $contactId);*/

    abstract public function profileGet(int $tenantId);

    abstract public function profileUpdate(array $user);

    abstract public function profileDelete(int $contactId, string $reason, string $countryCode);

    abstract public function paymentsGet(int $contactId, string $countryCode);

    abstract public function paymentsCreate(array $payload);

    abstract public function paymentHistory(int $contactId, string $countryCode);

    abstract public function isRegistered(int $contactId, string $countryCode);

    abstract public function emailConfirmed(int $contactId, string $countryCode);

    abstract public function appealCreate(array $data, string $countryCode):ApiAppealCreatedData;

    abstract public function appealMessageCreate(array $payload, $id, string $countryCode);

    abstract public function appealRated(array $payload, string $countryCode);

    abstract public function chatMessageCreated(array $payload, string $countryCode);

    abstract public function chatCreate(int $contactId, string $countryCode);

    abstract public function noticeGet(int $contactId, string $countryCode);

    abstract public function documentGet(int $contactId, string $countryCode);

}
