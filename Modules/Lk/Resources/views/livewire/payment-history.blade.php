<div class="payments-history" :class="{active:history}" x-data="dateRangePicker(@entangle('filterDates'), @js(App::getLocale()) )">
{{--, @js(App::getLocale())--}}
    <div class="payments-history-scroll" x-ref="scroll">
        @if($isMessages)
            <div class="payments-history-header">
                <label class="datePicker @if($filterDates) active @endif">
                    <input type="text" x-ref="datepicker" x-model="value" placeholder="{{__('payments-select-date')}}"
                           readonly="readonly">
                    <button @click="reset()" x-show="value"></button>
                </label>

                <div class="divider"></div>
                @foreach($purposes as $purpose)
                    @if($purpose->active)
                        <button
                            class="thin @if(in_array($purpose->type, $filterPurposes)) active @endif"
                            wire:click="filterByPurposes('{{$purpose->type}}')">
                            {{$purpose->content->title}}
                        </button>
                    @endif
                @endforeach

            </div>
        @endif

        <div class="payments-history-table" :class="scrolling()">

            @if(count($payments))

                @foreach($payments as $payment)
                    @if(!empty($payment->amount) && in_array($payment->type, $allowedPurposes))
                        <div class="payments-history-row">
                            <div class="payments-history-col">
                                @money($payment->amount->value)
                                {{ @$payment->amount->currency }}
                            </div>
                            <div class="payments-history-col">
                                {{ \Carbon\Carbon::parse($payment->payed_at)->format('d.m.y') }}
                            </div>
                            <div class="payments-history-col">
                                <x-lk::ui.block.payment-purpose :payment="$payment" :purpose="$purposes->where('type','=', $payment->type)->first()" direction="left"/>
                            </div>
                        </div>
                    @endif
                @endforeach

            @else
                <div class="payments-no-history">

                    <img src="{{ vite::asset('resources/img/icons/no-payments.svg') }}" alt="img"/>

                    <p>
                        @if($isMessages)
                            {!!__('payments-empty-history')!!}
                        @else
                            {!!__('payments-empty-filter')!!}
                        @endif
                    </p>

                    @if(!$isMessages)
                        <button wire:click="resetFilters" class="fancy">{{__('payments-reset-filters')}}</button>
                    @endif

                </div>
            @endif

        </div>
    </div>
</div>

