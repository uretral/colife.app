<div class="primary-body">
    <h1>{{__('articles-news')}}</h1>

    <fieldset>
        <label>
            <input type="search"
                   placeholder="{{__('articles-search')}}"
                   wire:model="search"
                   @click="$wire.dispatch('onInputSearchArticleClick')"
                   @focusout="$wire.dispatch('onInputSearchArticleFocusout')"
            />
            @if($this->search)
                <button class="close" wire:click="clearSearch"></button>
            @endif
        </label>

        <button type="button" class="search" wire:click="direction"></button>

    </fieldset>

    <div class="primary-articles">

        @foreach($this->articles() as $article)
            <article class="article" @if($loop->first) id="top" @endif>
                @if($article->image)
                    <img src="{{asset('storage/'.$article->image)}}" alt="img"/>
                @endif
                <h2>
                    <a
                        href="{{route('lk.article.page', $article->id)}}"
                        @click="$wire.dispatch('onArticleTitleClicked','{{$article->id}}')">

                        {{@$article->content->title}}

                    </a>
                </h2>

                <p>
                    {!! @$article->content->intro !!}
                </p>

                <div class="article-footer">
                    <div class="article-reactions">
                        @foreach($this->reactions() as $reaction)
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
                    <div class="article-date">
                        @if($article->updated_at)
                            {{ @\Carbon\Carbon::make($article->updated_at)->format('d.m.y')}}
                        @endif

                    </div>
                </div>
            </article>

        @endforeach


    </div>

    @if($this->articles()->lastPage() > 1)
        <div class="primary-pagination">
            @for ($item = 1; $item <= $articles->lastPage() ; $item ++)
                @if($item === $this->articles()->currentPage())
                    <a class="disabled" wire:click="gotoPage({{$item}})">{{$item}}</a>
                @else
                    <a href="#top" wire:click="gotoPage({{$item}})">{{$item}}</a>
                @endif

            @endfor
        </div>
    @endif

</div>
