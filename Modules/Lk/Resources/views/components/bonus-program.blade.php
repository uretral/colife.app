<div class="bonus-body">

    <div class="bonus-general">
        <h3>{{$general->content->title}}</h3>
        <ul>
            @foreach($general->texts as $generalItem)
                @if($generalItem->active)
                    <li>{{$generalItem->content->text}}</li>
                @endif

            @endforeach
        </ul>
    </div>
    <div class="bonus-general_bg"></div>
    <h2>{{__('bonus-info-H2')}}</h2>
    @foreach($common as $commonItem)
        @if($commonItem->active)

            <div class="bonus-section">
                <h3>{{$commonItem->content->title}}</h3>
                <div class="bonus-announces">
                    @foreach($commonItem->announces as $announce)
                        @if($announce->active)
                            <div class="bonus-announce">
                                <h4>{{$announce->content->title}}</h4>
                                <p>{{$announce->content->text}}</p>
                            </div>
                        @endif
                    @endforeach

                </div>

                <ul>
                    @foreach($commonItem->texts as $text)
                        @if($text->active)
                            <li>{{$text->content->text}}</li>
                        @endif
                    @endforeach

                </ul>

            </div>

        @endif

    @endforeach

</div>
