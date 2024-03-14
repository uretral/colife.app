<?php

namespace Modules\Lk\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\Invoice\InvoiceData;
use Modules\Lk\Data\Payment\PaymentData;
use Modules\Lk\Entities\Payment;
use Modules\Lk\Repositories\UserRepository;

class PaymentToPay extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() : View
    {
        $payments = InvoiceData::collection(
            app(CrmLkApi::class)->paymentsGet(
            UserRepository::getAuthUser()->bx_id,UserRepository::getAuthUserCountryCode()
        ));

        session()->put('payments',$payments->toCollection());
        return view('lk::components.payment-to-pay',[
            'payments' => $payments->toCollection(),
            'cnt' => $payments->count()
        ]);
    }
}
