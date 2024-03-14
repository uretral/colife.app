<?php


namespace Modules\CrmApi\Contracts;


use Modules\CrmApi\Data\Responses\ApiAppealCreatedData;

abstract class CrmMyApi implements CrmApi
{

    abstract public function profileGet(int $landlordId);

    abstract public function profileUpdate(array $user);

    abstract public function profileDelete(int $contactId, string $reason);

    abstract public function paymentsGet(int $contactId);

    abstract public function paymentExpenseTransactions(int $landlordId, string $countryCode);

    abstract public function paymentFinancialData(int $landlordId, string $countryCode);

    abstract public function paymentIncome(int $landlordId, string $countryCode);

    abstract public function isRegistered(int $contactId);

    abstract public function emailConfirmed(int $contactId);

    abstract public function appealCreate(array $data):ApiAppealCreatedData;

    abstract public function appealMessageCreate(array $payload, $id);

    abstract public function appealRated(array $payload);

    abstract public function chatMessageCreated(array $payload);

    abstract public function noticeGet(int $contactId);

    abstract public function estateList($landlordId, string $countryCode);

    abstract public function documentList($landlordId);

    abstract public function requestFirstMessageCreate(array $payload, $id);

    abstract public function requestMessageCreate(array $payload, $id);

    abstract public function requestRated(array $payload);

    abstract public function phoneUpdate(array $payload, int $landlordId);

    abstract public function contactUpdate(array $payload, int $landlordId);

    abstract public function documentGet(int $landlordId, string $countryCode);



}
