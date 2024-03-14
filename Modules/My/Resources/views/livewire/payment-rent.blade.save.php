<div class="payments-body">
{{--    @dd($this->payments())--}}

    <div class="payments-history" :class="{active:history}" x-data="dateRangePicker(@entangle('dateBetween').live)">

        <div class="payments-history-header">
            <label class="datePicker @if($dateBetween) active @endif" >
                <input type="text" x-ref="datepicker" x-model="value" placeholder="{{__('payments-select-date')}}" readonly="readonly">
                <button @click="reset()" x-show="value"></button>
            </label>

            <div class="divider"></div>

            <div class="payments-flats" x-data="toggle()" @click.outside="close()">

                <div class="payments-flats-btn @if($estateButton) active @endif"
                     @if($estateButton) data-hint="{{$estateButton}}" @endif
                >

                    @if($estateButton)
                        <span>{{\Str::limit($estateButton, 22,'...')}}</span>
                        <button wire:click="resetEstate()"></button>
                    @else
                        <span @click="open()">{{__('payments-select-object')}}</span>
                    @endif

                </div>

                <div class="payments-flats-select" :class="{active}" @mouseleave="close()">

                    <span>{{__('payments-all-objects')}}</span>

                    <div class="payments-flats-options">
                        @foreach($estateButtons as $key => $button)
                                <button
                                    class="@if($estateButton == $button) active @endif"
                                    data-hint="{{$button}}"
                                    wire:click="filterByEstateItem('{{$key}}')">
                                    {{$button}}
                                </button>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="payments-history-table">

        @if(count($this->payments()))

            @foreach($this->payments() as $payment)
                <div class="payments-history-row">
                    <div class="payments-history-col">@money($payment->amount->value)</div>
                    <div class="payments-history-col">{{$payment->apartment->estate_address}}</div>
                    <div class="payments-history-col">
                        {{ $payment->period_start }}
                    </div>
                    <div class="payments-history-col @if(!$payment->comment) inactive @endif">
                        @if($payment->comment)
{{--                            Чек <a target="_blank" href="{{ vite::asset($payment->document)}}" class="downloadBtn" download="true"></a>--}}
                            {{__('payments-receipt')}} <a target="_blank" href="javascript:" class="downloadBtn" download="true"></a>
                        @endif

                    </div>
                    <div class="payments-history-col">
                        <div class="payment-purpose-hint payment-type-1"> {{-- $payment->type  --}}
                            {{\Modules\My\Helpers\PluralsService::paymentMethod(1)}}
                        </div>

                        @if($payment->comment)
                            <cite data-text="{{$payment->comment}}">
                                <img src="{{ vite::asset('Modules/My/Resources/assets/img/icons/info.svg') }}" alt="icon"/>
                            </cite>
                        @endif

                    </div>
                </div>
            @endforeach

        @else
            <div class="payments-no-history">

                <img src="{{ vite::asset('Modules/My/Resources/assets/img/icons/no-payments.svg') }}" alt="img"/>

                <p>
                    @if(is_null($dateBetween) && !count($estates))
                        {!! __('payments-nothing-to-show') !!}
                    @else
                        {!! __('payments-nothing-to-filter') !!}
                    @endif
                </p>
                @if($dateBetween || count($estates))
                    <button wire:click="resetFilters" class="fancy">{{__('payments-reset-filters')}}</button>
                @endif

            </div>
        @endif

    </div>

</div>
