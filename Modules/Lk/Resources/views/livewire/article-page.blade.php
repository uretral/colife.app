<x-lk::ui.frame.left-menu>
    <div class="primary-header">

        <h1><a href="{{route('lk.home')}}"></a>{{@$this->article()->content->title}}</h1>

    </div>

    <div class="primary-body">
        <div class="article-top">
            <div class="article-reactions">
                @foreach($this->reactions() as $reaction)
                    <div
                        @if($this->article()->reactions->where('reaction_id','=', $reaction->id)->where('user_id','=', $userId)->count() )
                            class="article-reaction active"
                        wire:click="removeReaction( {{$this->article()->id}}, {{$reaction->id}} )"
                        @else
                            class="article-reaction"
                        wire:click="addReaction( {{$this->article()->id}}, {{$reaction->id}} )"
                        @endif
                    >
                        <img src="{{asset('storage/'.$reaction->icon)}}" alt="icon"/>
                        <span>{{$this->article()->reactions->where('reaction_id','=', $reaction->id)->count()}}</span>
                    </div>
                @endforeach
            </div>
            <div class="article-date">
                @if($this->article()->updated_at)
                    {{\Carbon\Carbon::make($this->article()->updated_at)->format('d.m.y')}}
                @endif
            </div>

        </div>
        <article class="article single">
            @if($this->article()->image)
                <img src="{{asset('storage/'.$this->article()->image)}}" alt="img"/>
            @endif

            {!! @$this->article()->content->text !!}

        </article>
    </div>

    <div class="primary-aside">
        <livewire:lk::notice/>
    </div>
</x-lk::ui.frame.left-menu>
