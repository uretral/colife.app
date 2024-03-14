<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\My\Data\Article\ArticleData;
use Modules\My\Entities\Article;
use Modules\My\Traits\Livewire\NewsProps;

class AsideNews extends Component
{
    use NewsProps;

    #[Computed]
    public function articles()
    {
        $articleData = Article::with(['reactions','content'])
            ->whereHas('content', function ($query) {
                $query->when(strlen($this->search) > 3, function ($query) {
                    $query
                        ->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('intro', 'like', '%' . $this->search . '%')
                        ->orWhere('text', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('updated_at', $this->sort ? 'asc' : 'desc')
            ->take(2)->get();

        return ArticleData::collection($articleData)->items();
    }

    public function render(): View
    {
        return view('my::livewire.aside-news', [
            'reactions' => $this->getReactions(),
            'userId' => $this->userId,
        ]);
    }
}
