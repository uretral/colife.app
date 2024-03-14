<x-my::frame.left-menu>

    <div class="news" x-data="{news: true}">
        <h2><a href="{{route('my.home')}}"></a>{{@$article->content->title}}</h2>

        <div class="news-row">
            <div class="news-switcher item">
                <div class="switcherMenu">
                    <button :class="{active: news}" @click="news = true">Новости</button>
                    <button :class="{active:  !news}" @click="news = false"> Финансы</button>
                </div>
            </div>
            <div class="news-items" :class="{active:  news}">
                <div class="news-items-header">
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
                <article class="news-item article">

                    <div class="news-item-header">
                        <div class="news-item-img">
                            <img src="{{asset('storage/'.$article->image)}}" alt="img"/>
                        </div>
                    </div>

                    <div class="mobile-heading">{{@$article->content->title}}</div>

                    {!! @$article->content->text !!}
                </article>
            </div>
            <livewire:my::aside-summary/>
        </div>

    </div>

</x-my::frame.left-menu>
