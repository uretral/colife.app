<div class="payments-body">

    <div class="payments-history" :class="{active:history}" x-data="dateRangePicker( @js(App::getLocale() ) )">

        <div class="payments-history-header">
            <label class="datePicker @if($periodFrom || $periodTo) active @endif">
                <input type="text" x-ref="datepicker" x-model="model" placeholder="{{__('payments-select-date')}}"
                       readonly="readonly">
                <button @click="reset()" x-show="model"></button>
            </label>
            @if($this->payments()->count())

                <div class="divider"></div>

                <div class="payments-flats" x-data="toggle()" @click.outside="close()">

                    <div class="payments-flats-btn @if($estateAddress) active @endif"
                         @if($estateAddress) data-hint="{{$estateAddress}}" @endif
                    >

                        @if($estateAddress)
                            <span>{{\Str::limit($estateAddress, 22,'...')}}</span>
                            @if(!$isEstatePage)
                                <button wire:click="resetEstate()"></button>
                            @endif
                        @else
                            @if(!$isEstatePage)
                                <span @click="open()">{{__('payments-select-object')}}</span>
                            @endif
                        @endif

                    </div>

                    <div class="payments-flats-select" :class="{active}" @mouseleave="close()">

                        <span>{{__('payments-all-objects')}}</span>

                        <div class="payments-flats-options">
                            @foreach($estateButtons as $key => $buttonAddress)
                                <button
                                    class="@if($estateAddress == $buttonAddress) active @endif"
                                    data-hint="{{$buttonAddress}}"
                                    wire:click="setButton({{$key}})"
                                    @click="close()"
                                >
                                    {{$buttonAddress}}
                                </button>
                            @endforeach
                        </div>
                    </div>

                </div>

            @endif

        </div>
    </div>

    <div class="payments-history-table">
{{--@dump($this->payments())--}}
        @if(count($this->payments()))

            @foreach($this->payments() as $payment)
{{--                @if($payment)--}}

                    <div class="payments-history-row">
                        <div class="payments-history-col"> <span>@money($payment?->amount?->value ?? 0) {!! \Modules\My\Repositories\UserRepository::getUserCurrency() !!}</span> </div>
                        <div class="payments-history-col">{{$payment->apartment->estate_address}}</div>
                        <div class="payments-history-col">
                            {{ \Carbon\Carbon::parse($payment->period_start)->format("d.m.Y") }} - {{ \Carbon\Carbon::parse($payment->period_end)->format("d.m.Y") }}
                        </div>
                        <div class="payments-history-col @if(!$payment->comment) inactive @endif">
                            @if($payment->receipt->count())
                                @foreach($payment->receipt as $receipt)
                                    {{__('payments-receipt')}}
                                    <a target="_blank" href="{{$receipt->url}}" class="downloadBtn" download="true"></a>
                                @endforeach
                            @endif

                        </div>
                        <div class="payments-history-col">
                            <div class="payment-purpose-hint payment-type-1"> {{-- $payment->type  --}}
                                {{\Modules\My\Helpers\PluralsService::paymentMethod(1)}}

                                @if($payment->comment)
                                    <cite data-text="{{$payment->comment}}">
                                        <img src="{{ vite::asset('Modules/My/Resources/assets/img/icons/info.svg') }}"
                                             alt="icon"/>
                                    </cite>
                                @endif
                            </div>

                        </div>
                    </div>

{{--                @endif--}}

            @endforeach

        @else
            <div class="payments-no-history">

                <img src="{{ vite::asset('Modules/My/Resources/assets/img/icons/no-payments.svg') }}" alt="img"/>

                <p>
                    @if(!$this->payments()->count())
                        {!! __('payments-nothing-to-show') !!}
                    @else
                        {!! __('payments-nothing-to-filter') !!}
                    @endif
                </p>
                @if($this->isFiltered() && array_key_exists($estateId, $estateButtons))
                    <button wire:click="resetFilters" class="fancy">{{__('payments-reset-filters')}}</button>
                @endif

            </div>
        @endif

    </div>

</div>
