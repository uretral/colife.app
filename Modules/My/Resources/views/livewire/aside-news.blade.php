<div class="charts-aside" :class="{active:  news}">
    <div class="charts-aside-header">
        <h2>{{__('summary-title-news')}}</h2>
        <a href="{{route('my.news')}}">{{__('summary-all-news')}}</a>
    </div>


    <fieldset>
        <label>
            <input type="search" placeholder="{{__('summary-news search')}}" wire:model.live="search">
        </label>
        <button type="button" class="search" wire:click="direction"></button>
    </fieldset>

    @foreach($this->articles() as $article)
        <article class="news-item">

            @if($article->image)
                <div class="news-item-header">
                    <div class="news-item-img">
                        <img src="{{asset('storage/'.$article->image)}}" alt="img"/>
                    </div>
                </div>
            @endif

            <h3>
                <a href="{{route('my.news.page', $article->id)}}">{{$article->content->title}}</a>
            </h3>

            <p>
                {!! $article->content->intro !!}
            </p>

            <div class="news-item-footer">
                <div class="article-reactions">
                    @foreach($reactions as $reaction)
                        <div
                            @if($article->reactions->where('reaction_id','=', $reaction->id)->where('user_id','=', $userId)->count() )
                                class="article-reaction active"
                            wire:click="removeReaction( {{$article->id}}, {{$reaction->id}} )"
                            @else
                                class="article-reaction"
                            wire:click="addReaction( {{$article->id}}, {{$reaction->id}} )"
                            @endif
                        >
                            <img src="{{asset('storage/'.$reaction->icon)}}" alt="icon"/>
                            <span>{{$article->reactions->where('reaction_id','=', $reaction->id)->count()}}</span>
                        </div>
                    @endforeach
                </div>
                <div class="news-item-date">
                    {{\Carbon\Carbon::make($article->updated_at)->format('d.m.y')}}
                </div>
            </div>
        </article>
    @endforeach


{{--

    <article class="news-item">

        <div class="news-item-header">
            <div class="news-item-img">
                <img src="{{ vite::asset('Modules/My/Resources/assets/img/pic/primary-1.jpeg') }}"
                     alt="img">
            </div>
        </div>

        <h3>
            <a href="/tenant/primary/8">Квартиры в Дубае для жизни</a>
        </h3>

        <p>
            Иногда в поисках объектов для инвестиций мы натыкаемся на квартиры, которые не подходят для
            инвестиций, но просто невероятные и прекрасные...
        </p>

        <div class="news-item-footer">
            <div class="article-reactions">
                <div class="article-reaction active" wire:click="removeReaction( 8, 1 )">
                    <img src="/storage/reactions/heart.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 2 )">
                    <img src="/storage/reactions/fire.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 3 )">
                    <img src="/storage/reactions/mouth.svg" alt="icon">
                    <span>6</span>
                </div>
            </div>
            <div class="news-item-date">
                11.07.23
            </div>
        </div>
    </article>

    <article class="news-item">

        <div class="news-item-header">
            <div class="news-item-img">
                <img src="{{ vite::asset('Modules/My/Resources/assets/img/pic/primary-2.jpeg') }}"
                     alt="img">
            </div>
        </div>

        <h3>
            <a href="/tenant/primary/8">Студия в Dubai Marina с доходностью до 20%</a>
        </h3>

        <p>
            Такие варианты похожи на несбыточную мечту, но мы готовы помочь вашей мечте осуществиться!
            Доходность от студии просто невероятная, спешите, п...
        </p>

        <div class="news-item-footer">
            <div class="article-reactions">
                <div class="article-reaction active" wire:click="removeReaction( 8, 1 )">
                    <img src="/storage/reactions/heart.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 2 )">
                    <img src="/storage/reactions/fire.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 3 )">
                    <img src="/storage/reactions/mouth.svg" alt="icon">
                    <span>6</span>
                </div>
            </div>
            <div class="news-item-date">
                11.07.23
            </div>
        </div>
    </article>

    <article class="news-item">

        <h3>
            <a href="/tenant/primary/8">Как увеличить доход от аренды квартиры с
                минимальными вложениями ?</a>
        </h3>

        <p>
            Бесплатный вебинар от команды Colife 20 июля в 20:00 Мкс
        </p>

        <div class="news-item-footer">
            <div class="article-reactions">
                <div class="article-reaction active" wire:click="removeReaction( 8, 1 )">
                    <img src="/storage/reactions/heart.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 2 )">
                    <img src="/storage/reactions/fire.svg" alt="icon">
                    <span>6</span>
                </div>
                <div class="article-reaction active" wire:click="removeReaction( 8, 3 )">
                    <img src="/storage/reactions/mouth.svg" alt="icon">
                    <span>6</span>
                </div>
            </div>
            <div class="news-item-date">
                11.07.23
            </div>
        </div>
    </article>
--}}



</div>
