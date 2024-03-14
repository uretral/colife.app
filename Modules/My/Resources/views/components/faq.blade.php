<div class="faq-header" x-data="{active: 0}">
    @forelse($faqs as $key => $faq)
        <a href="#faqAnchor_{{$key}}" class="anchor"
           :class="{active : inters === @js($key)}"
           @click="inters = @js($key)"
        >{{$faq->content->title}}</a>
    @empty
        <p>Нет данных</p>
    @endforelse
</div>

<div class="faq-body" x-data="{expanded: 0}" x-cloak>

    @forelse($faqs as $faqKey => $faq)
        <section id="faqAnchor_{{$faqKey}}" x-intersect.half="inters = @js($faqKey)">

            <h2 > {{@$faq->content->title}} </h2>

            @foreach($faq->articles as $articleKey => $article)

                <article
                    @if( $faqKey === 0 && $articleKey === 0 ) class="active" @endif
                :class="{ active : expanded === @js($article->id) }"
                >

                    <h3
                        @click="expanded = @js($article->id) === expanded ? 0 : @js($article->id)"
                    >{{@$article->content->title}}</h3>

                    <div class="faq-content"
                         x-show="expanded === @js($article->id)" x-collapse.duration.500ms
                    >

                        {!! @$article->content->text !!}

                    </div>

                </article>

            @endforeach

        </section>

    @empty
        <p>Нет данных</p>
    @endforelse

</div>
