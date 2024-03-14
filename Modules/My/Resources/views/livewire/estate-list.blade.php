<div class="estate" x-data>

    <h2>{{__('estate-my-estate')}}</h2>

    @foreach($estates as $estate)

        @if($estate->state == 4)
            <div class="estate-item vacation">
                <div class="estate-item-image " data-text="{{__('estate-rent-holidays')}}">
                </div>
                <div class="estate-item-info ">
                    <h3>{{$estate->title}}</h3>
                    <p>{{$estate->address}}</p>
                    <div class="estate-item-props">
                        <span>{{$estate->square}} {{__('estate-meter')}}<sup>2</sup></span>
                        <span>{{\Modules\My\Helpers\PluralsService::rooms(count(@$estate->rooms))}}</span>
                    </div>

                    <div class="estate-item-btn">
                        <button class="border">{{__('estate-docs')}}</button>
                    </div>

                </div>
            </div>
        @else

            <div class="estate-item">

                <div class="estate-item-image"

                     style="
                     @if($estate->photos)
                         background: url({{ @asset($estate->photos[0]?->url)}}) no-repeat center;
                     @else
                        background-size: 108px auto!important; background: url({{ vite::asset('Modules/My/Resources/assets/img/icons/no-photo.svg') }}) no-repeat center;
                     @endif
                    "

                     wire:click.self="openGallery('{{$estate->id}}')"
                >
                </div>

                <div class="estate-item-info @if(session('summaryTemplate') !== 'minimal') hint @endif state-{{$estate->state}}"
                     data-state="{{\Modules\My\Helpers\PluralsService::state($estate->state)}}">
                    <h3>{{@$estate->title}}</h3>
                    <p>{{@$estate->address}}</p>

                    @if(session('summaryTemplate') !== 'minimal')

                        <div class="estate-item-props">
                            <span>{{@$estate->square}} {{__('estate-meter')}}<sup>2</sup></span>
                            <span>{{\Modules\My\Helpers\PluralsService::rooms(count(@$estate->rooms))}}</span>
                            <span>{{$this->countUnits($estate)}}</span>
                        </div>

                        @foreach($estate->rooms as $key => $room)
                            <div class="estate-item-unit state-{{$room->state}}"
                                 data-state="{{\Modules\My\Helpers\PluralsService::state($room->state)}}">
                                <h4>{{__('estate-unit')}} {{$key+1}}</h4>

                                @if($room->state === 3)
                                    <div class="estate-item-tenant empty">
                                        {{__('estate-no-one-here-yet')}}
                                    </div>
                                @else
                                    @foreach($room->units as $key => $unit)

                                        @if($unit->tenant)
                                            <div class="estate-item-tenant">
                                                <div class="estate-item-tenant_name">
                                                    {{--
                                                    <div class="estate-item-tenant_avatar">
                                                        {!! $unit->tenant->avatar !!}
                                                    </div>
                                                     {{$unit->tenant->name}}
                                                     --}}
                                                    {{__('estate-tenant')}} {{$key + 1}}
                                                </div>
                                                <div
                                                    class="estate-item-tenant_schedule">{{__('estate-rent-up-to')}} {{$unit->rent_until}}</div>
                                                <div class="estate-item-tenant_payment"> @money($unit->price) </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @endif

                            </div>
                        @endforeach

                    @endif



                    <div class="estate-item-btn">
                        <button class="border icon-right" wire:click="goToPaymentRent( '{{$estate->id}}' )">
                            {{__('estate-operations-history')}}
                        </button>
                        <button class="border" wire:click="onOpenDocs(true)">{{__('estate-docs')}}</button>
                    </div>

                    <div class="estate-item-link">
                        <a class="btn"
                           href="{{route('my.estate-item', $estate->id)}}"> {{-- href="{{route('my.payments-rent', $estate->id)}}" --}}
                            <span>{{__('estate-detailed-information')}}</span>
                        </a>
                    </div>

                </div>
            </div>

            <x-my::frame.modal-slider event="onOpenGallery{{$estate->id}}">

                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($estate->photos as $photo)
                            <div class="swiper-slide">
                                <div class="swiper-slide-wpr">
                                    <img src="{{asset($photo->url)}}" alt="img"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </x-my::frame.modal-slider>

        @endif

    @endforeach


    <x-my::frame.modal title="{{__('estate-docs')}}" event="onOpenDocs">
        <fieldset>
            <div class="download-link end">
                <a href="http://my.webapp.loc/files/sample.pdf" download="">Соглашение о конфиденциальности.pdf</a>
            </div>
            <div class="download-link end">
                <a href="http://my.webapp.loc/files/sample.pdf" download="">Соглашение о других очень важных
                    шт...pdf</a>
            </div>
            <div class="download-link end">
                <a href="http://my.webapp.loc/files/sample.pdf" download="">Соглашение о конфиденциальности.pdf</a>
            </div>

        </fieldset>
    </x-my::frame.modal>

</div>
