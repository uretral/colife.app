<button class="sw @if($cnt > 9) small @endif "
        :class="{active: !history}"
        id="toPay"
        data-cnt="{{$cnt}}"
        @click="history = false"
>{{__('payments-to-paid')}}</button>
<div class="payments-carousel" :class="{active: !history}" x-data="horizontalScroll()">
    <div class="payments-carousel-wrapper" x-ref="tgt">
        <div class="payments-cards " :style="{height: getWidth()}">
            @foreach($payments as $key => $payment)
                <div class="payments-card">

                    <x-lk::ui.block.payment-purpose :payment="$payment"/>

                    <div class="payments-card-deadline">
                        {{__('payments-before')}} {{@\Carbon\Carbon::parse($payment->deadline)->translatedFormat('j F Y')}}
                    </div>

                    <div class="payments-card-footer">
                        <div class="payments-card-amount">@money($payment->amount) {{ $payment->currency }}</div>

                        <a href="javascript:"
                           class="btn accent"
                           @click="Livewire.emit('onPayBtnClick',{{ @$payment->id }})"
                        >{{__('payments-btn-pay')}}</a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</div>

