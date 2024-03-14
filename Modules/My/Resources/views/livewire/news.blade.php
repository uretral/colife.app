<div class="news-items @if(session('summaryTemplate') !== 'minimal') wide @endif" :class="{active:  news}">
    <h2>{{__('news-news')}}</h2>

    <fieldset>
        <label>
            <input type="search" placeholder="{{__('news-search')}}" wire:model.live="search">
        </label>
        <button type="button" class="search" wire:click="direction"></button>
    </fieldset>

    @foreach($this->articles()->items() as $article)
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

    @if($this->articles()->lastPage() > 1)
        <div class="primary-pagination">
            @for ($item = 1; $item <= $this->articles()->lastPage() ; $item ++)
                @if($item === $this->articles()->currentPage())
                    <a class="disabled" wire:click="gotoPage({{$item}})">{{$item}}</a>
                @else
                    <a href="javascript:" wire:click="gotoPage({{$item}})">{{$item}}</a>
                @endif

            @endfor
        </div>
    @endif

</div>
