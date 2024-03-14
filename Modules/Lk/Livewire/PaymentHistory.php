<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeCheckPaymentsHistory;
use App\Services\Amplitude\Handle\AmplitudePay;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Modules\CrmApi\Api\Payment\GetPaymentHistory;
use Modules\CrmApi\Contracts\CrmApi;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\Invoice\CreateSessionData;
use Modules\Lk\Data\Payment\PaymentData;
use Modules\Lk\Data\Payment\PaymentPurposeData;
use Modules\Lk\Entities\Payment;
use Modules\Lk\Entities\PaymentPurpose;
use Modules\Lk\Jobs\Amplitude\AmplitudeCheckPaymentsHistoryJob;
use Modules\Lk\Jobs\Amplitude\AmplitudePayJob;
use Modules\Lk\Repositories\UserRepository;

class PaymentHistory extends Component
{
    public $filterPurposes = [];
    public $filterDates    = '';


    protected $listeners = [
        'onPayBtnClick'
    ];

    public function resetFilters()
    {
        $this->filterPurposes = [];
        $this->filterDates = '';
    }

    public function filterByPurposes($purposeType)
    {
        if (in_array($purposeType, $this->filterPurposes)) {
            $this->filterPurposes = array_diff($this->filterPurposes, [$purposeType]);
        } else {
            $this->filterPurposes[] = $purposeType;
        }
    }

    public function prepareDate(): ?array
    {
        $split = preg_split("/(—|-|to)/", $this->filterDates);
        if (is_array($split) && count($split) === 2) {
            $arrDate = [
                // Почему-то addDays не видит
                Carbon::createFromFormat('d.m.y', trim($split[0]))->format('d.m.Y') . ' 00:00:00',
                Carbon::createFromFormat('d.m.y', trim($split[1]))->format('d.m.Y') . ' 23:59:59'
            ];

            AmplitudeCheckPaymentsHistoryJob::dispatch(
                [
                    'date_from'           => $arrDate[0],
                    'date_to'             => $arrDate[1],
                    'num_payments'        => 'test - не подключено',
                    'payment_type_filter' => 'test - не подключено',
                ]
            );
            return $arrDate;
//            30.07.2022 23:01:07

        } else {
            return null;
        }
    }

    public function purposes(): Enumerable
    {
        return PaymentPurposeData::collection(
            PaymentPurpose::where('is_hidden', 0)->get()->sortBy('order')
        )->toCollection();
    }

    /*
     * bx_id = 34476 // 23328 2
     * */
    public $json = '{"result":true,"data":[{"id":5514,"payed_at":null,"tenant":"29206","amount":null,"plan":null,"refund":null,"comment":"нет аналитики","type":null},{"id":5604,"payed_at":"02.07.2022 15:31:39","tenant":"29206","amount":{"value":"4500","currency":"AED"},"plan":null,"refund":null,"comment":null,"type":"Rent"},{"id":5606,"payed_at":"05.07.2022 15:51:50","tenant":"29206","amount":{"value":"200","currency":"AED"},"plan":null,"refund":null,"comment":null,"type":"Rent"},{"id":5608,"payed_at":"30.07.2022 23:01:07","tenant":"29206","amount":{"value":"4700","currency":"AED"},"plan":null,"refund":null,"comment":null,"type":"Rent"},{"id":5610,"payed_at":"01.09.2022 12:59:12","tenant":"29206","amount":{"value":"4800","currency":"AED"},"plan":null,"refund":null,"comment":"штраф","type":"Penalties"},{"id":5616,"payed_at":"26.09.2022 13:04:26","tenant":"29206","amount":{"value":"4800","currency":"AED"},"plan":null,"refund":null,"comment":"штраф","type":"Rent"},{"id":5618,"payed_at":"26.10.2022 10:00:03","tenant":"29206","amount":{"value":"4800","currency":"AED"},"plan":null,"refund":null,"comment":"штраф","type":"Rent"},{"id":5620,"payed_at":"30.11.2022 17:34:23","tenant":"29206","amount":{"value":"4700","currency":"AED"},"plan":null,"refund":null,"comment":null,"type":"Other revenue"},{"id":5622,"payed_at":"26.12.2022 17:56:40","tenant":"29206","amount":{"value":"4700","currency":"AED"},"plan":null,"refund":null,"comment":null,"type":"Rent"},{"id":5624,"payed_at":"02.07.2022 15:31:39","tenant":"29206","amount":{"value":"2250","currency":"AED"},"plan":null,"refund":null,"comment":"изначально жил в 4.1 за 4500, поэтому внес 50%","type":"Deposit"},{"id":5626,"payed_at":"05.07.2022 15:51:50","tenant":"29206","amount":{"value":"100","currency":"AED"},"plan":null,"refund":null,"comment":"доплатил депозит за 4.2","type":"Deposit"},{"id":5628,"payed_at":"23.01.2023 13:44:29","tenant":"29206","amount":null,"plan":null,"refund":"2350|AED","comment":null,"type":"Deposit"}],"metadata":[],"processed_at":500}';

    public function payments(): Enumerable
    {
        $json = app(CrmLkApi::class)->paymentHistory(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        );

//        $json= json_decode($this->json)->data;

        /*        if (in_array(UserRepository::getAuthUser()->bx_id, [29206, 0])) {
                    dump(PaymentData::collection($json)
                        ->toCollection()
                        ->when(count($this->filterPurposes), function ($query) {
                            return $query->whereIn('type', $this->filterPurposes, false);
                        })
                        ->when($this->prepareDate(), function ($query) {
                            return $query->filter(function ($item) {
                                return Carbon::parse($item->payed_at)->gte($this->prepareDate()[0]) && Carbon::parse($item->payed_at)->lte($this->prepareDate()[1]);
                            });
                        })
                        ->sortByDesc(function (PaymentData $col) {
                            return \Carbon\Carbon::parse($col->payed_at);
                        }));
                }*/


        return PaymentData::collection($json)
            ->toCollection()
            ->when(
                count($this->filterPurposes),
                function ($query) {
                    return $query->whereIn('type', $this->filterPurposes, false);
                }
            )
            ->when(
                $this->prepareDate(),
                function ($query) {
                    return $query->filter(
                        function ($item) {
                            return Carbon::parse($item->payed_at)->gte($this->prepareDate()[0]) && Carbon::parse(
                                    $item->payed_at
                                )->lte($this->prepareDate()[1]);
                        }
                    );
                }
            )
            ->sortByDesc(
                function (PaymentData $col) {
                    return \Carbon\Carbon::parse($col->payed_at);
                }
            );
    }

    public function IsMessages(): int
    {
        return Payment::where('status_id', 2)->count();
    }

    public function onPayBtnClick($paymentId = false)
    {
        try {
            $sessionPayments = CreateSessionData::from(
                collect(session()->get('payments'))->where('id', $paymentId)->first()
            );

            $api = app(CrmLkApi::class)->paymentsCreate($sessionPayments->toArray());

            /* Событие Amplitude - Клик на кнопку оплатить */
            AmplitudePayJob::dispatch(
                [
                    'payment_id'   => 'test - не подключено',
                    'payment_type' => 'test - не подключено',
                    'page'         => 'test - не подключено',
                ]
            );

            return redirect()->route('lk.payments.checkout', ['invoiceId' => $paymentId, 'clientSecret' => $api->clientSecret]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            throw new \RuntimeException('Ошибка формирования платежа');
        }
    }

    public function render(): View
    {
        return view(
            'lk::livewire.payment-history',
            [
                'purposes'        => $this->purposes(),
                'allowedPurposes' => $this->purposes()->pluck('type')->toArray(),
                'payments'        => $this->payments(),
                'filterPurposes'  => $this->filterPurposes,
                'filterDate'      => $this->prepareDate(),
                'isMessages'      => $this->IsMessages()
            ]
        );
    }
}
