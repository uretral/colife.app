<div class="estate item" x-data="{active: false, img: '', key: null}">

    <div class="estate-modal" :class="{active}">
        <div class="estate-modal-header">
            <button @click="active = false"></button>
            <span><em x-text="key"></em> из {{count($estate->photos)}}</span>
            <a :href="img" download=""></a>
        </div>

        <img :src="img" alt="img"/>
    </div>

    <div class="estate-item">
        @if($estate->photos)
            <div class="estate-item-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        @foreach($estate->photos as $key => $photo)
                            <div class="swiper-slide">
                                <div class="swiper-slide-wpr">
                                    <img src="{{$photo->url}}" alt="img"
                                         @click="active = true, img = '{{$photo->url}}', key = {{$key + 1}}"
                                    />
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        @else
            <div class="estate-item-image"
                 style="background-size: 108px auto!important; background: url({{ vite::asset('Modules/My/Resources/assets/img/icons/no-photo.svg') }}) no-repeat center;"></div>
        @endif

        <div class="estate-item-info state-{{$estate->state}}"
             data-state="{{\Modules\My\Helpers\PluralsService::state($estate->state)}}">
            <h3>{{@$estate->title}}</h3>
            <p>{{@$estate->address}}</p>
            <div class="estate-item-props">
                <span>{{@$estate->square}} м<sup>2</sup></span>
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
                        @foreach($room->units as $unit)

                            @if($unit->tenant)
                                <div class="estate-item-tenant">
                                    <div class="estate-item-tenant_name">
                                        {{--                                        <div class="estate-item-tenant_avatar">
                                                                                    {!! $unit->tenant->avatar !!}
                                                                                </div>
                                                                                <span>{{$unit->tenant->name}}</span>--}}
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


            <div class="estate-item-btn">
                <button class="border icon-right" wire:click="goToPaymentRent( '{{$estate->id}}' )">
                    <span> {{__('estate-operations-history')}} </span>
                </button>
                <button class="border" wire:click="onOpenDocs(true)">
                    <span> {{__('estate-docs')}} </span>
                </button>
            </div>

            <div class="estate-item-link">
                <a class="btn" href="javascript:">
                    <span> {{__('estate-detailed-information')}} </span>
                </a>
            </div>

            <div class="estate-item-back">
                <a class="btn" href="{{route('my.estate')}}">
                    <span> {{__('estate-back')}} </span>
                </a>
            </div>

        </div>
    </div>

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
