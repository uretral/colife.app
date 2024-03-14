<?php


namespace Modules\CrmApi\Contracts\Implementations;


use App\Services\Bitrix\Data\My\BitrixMyProfileData;
use Illuminate\Support\Facades\Log;
use Modules\CrmApi\Api\Appeal\CreateAppeal;
use Modules\CrmApi\Api\Appeal\CreateAppealMessage;
use Modules\CrmApi\Api\Appeal\CreateAppealRate;
use Modules\CrmApi\Api\Chat\CreateChatMessage;
use Modules\CrmApi\Api\Contact\ContactEmailConfirmed;
use Modules\CrmApi\Api\Contact\ContactRegistered;
use Modules\CrmApi\Api\Contact\GetContact;
use Modules\CrmApi\Api\Contact\UpdateMyContact;
use Modules\CrmApi\Api\Contact\UpdateMyPhone;
use Modules\CrmApi\Api\Contact\UpdateMyProfile;
use Modules\CrmApi\Api\Document\GetDocuments;
use Modules\CrmApi\Api\Document\GetMyDocumentList;
use Modules\CrmApi\Api\Estate\GetEstateList;
use Modules\CrmApi\Api\Notice\GetNotice;
use Modules\CrmApi\Api\Payments\GetExpenseTransactions;
use Modules\CrmApi\Api\Payments\GetFinancialData;
use Modules\CrmApi\Api\Payments\GetIncome;
use Modules\CrmApi\Api\Request\CreateFirstRequestMessage;
use Modules\CrmApi\Api\Request\CreateRequestMessage;
use Modules\CrmApi\Api\Request\CreateRequestRate;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\CrmApi\Data\Responses\ApiAppealCreatedData;
use Spatie\LaravelData\Data;

class MyBridgeApi extends CrmMyApi
{
    public function __construct()
    {
    }

    public function profileGet(int $landlordId)
    {
        $data = ['code' => auth()->guard('my')->user()?->country_code];
        return app(GetContact::class)->request($data, $landlordId)?->data ?? [];
    }

    /**
     * @throws \Exception
     */
    public function profileUpdate(array $user)
    {
        $profile = BitrixMyProfileData::from($user);
        return app(UpdateMyProfile::class)->request($profile->toArray(), $profile->bx_id);
    }

    public function profileDelete(int $contactId, string $reason)
    {
        // TODO: Implement profileDelete() method.
    }

    public function paymentsGet(int $contactId)
    {
        // TODO: Implement paymentsGet() method.
    }

    public function isRegistered(int $contactId)
    {
        return app(ContactRegistered::class)
            ->request([], $contactId)
            ?->result;
    }

    public function emailConfirmed(int $contactId)
    {
        return app(ContactEmailConfirmed::class)
                ->request([], $contactId)
                ?->result
            ?? false;
    }

    public function appealCreate(array $data): ApiAppealCreatedData
    {
        $response = app(CreateAppeal::class)->request($data);
        return ApiAppealCreatedData::from(
            $response->data ?? []
        );
    }

    public function appealMessageCreate(array $payload, $id)
    {
        return app(CreateAppealMessage::class)->request($payload, $id);
    }

    public function appealRated(array $payload)
    {
        return app(CreateAppealRate::class)->request($payload);
    }

    public function chatMessageCreated(array $payload)
    {
        return app(CreateChatMessage::class)->request($payload);
    }

    public function noticeGet(int $contactId): array
    {
        return app(GetNotice::class)->request([], $contactId);
    }

    public function estateList($landlordId, string $countryCode): array
    {
        $apiData =  app(GetEstateList::class)->request(
            params: ['code' => $countryCode],
            id: $landlordId
        );
        Log::channel('my')->info("Api:", ['data' => $apiData]);
        return $apiData;
    }

    public function documentList($landlordId): array
    {
        return app(GetMyDocumentList::class)->request([], $landlordId);
    }

    public function requestFirstMessageCreate(array $payload, $id)
    {
        return app(CreateFirstRequestMessage::class)->request($payload, $id);
    }

    public function requestMessageCreate(array $payload, $id)
    {
        return app(CreateRequestMessage::class)->request($payload, $id);
    }

    public function requestRated(array $payload)
    {
        return app(CreateRequestRate::class)->request($payload);
    }

    public function phoneUpdate(array $payload, int $landlordId)
    {
        return app(UpdateMyPhone::class)->request($payload, $landlordId);
    }

    public function contactUpdate(array $payload, int $landlordId)
    {
        return app(UpdateMyContact::class)->request($payload, $landlordId);
    }

    public function documentGet(int $contactId, string $countryCode): array
    {
        return app(GetDocuments::class)->request(
                params: ['code' => $countryCode],
                id: $contactId
            )?->data ?? [];
    }

    public function paymentExpenseTransactions(int $landlordId, string $countryCode): array
    {
        return app(GetExpenseTransactions::class)->request(
                params: ['code' => $countryCode],
                id: $landlordId
            )?->data ?? [];
    }

    public function paymentFinancialData(int $landlordId, string $countryCode): array
    {
        return app(GetFinancialData::class)->request(
                params: ['code' => $countryCode],
                id: $landlordId
            )?->data ?? [];
    }

    public function paymentIncome(int $landlordId, string $countryCode)
    {
        return app(GetIncome::class)->request(
                params: ['code' => $countryCode],
                id: $landlordId
            )?->data ?? [];
    }
}
