<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\My\Data\Article\ArticleData;
use Modules\My\Entities\Article;
use Modules\My\Traits\Livewire\NewsProps;

class News extends Component
{

    use WithPagination, NewsProps;

    #[Computed]
    public function articles(): \Illuminate\Contracts\Pagination\Paginator
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
            ->paginate(5);

        return ArticleData::collection($articleData)->items();
    }

/*    public function setPageId($pageId) {
        \Session::put('article_id',$pageId);
        $this->redirect("/news/$pageId");
    }*/

    public function render(): View
    {
        return view('my::livewire.news', [
            'reactions' => $this->getReactions(),
            'userId' => $this->userId,
        ]);
    }
}
