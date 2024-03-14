<?php

namespace Modules\Lk\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Lk\Data\Article\ArticleData;
use Modules\Lk\Data\Article\ArticleReactionData;
use Modules\Lk\Entities\Article as TenantArticle;
use Modules\Lk\Entities\ArticleReaction;
use Modules\Lk\Livewire\Traits\WithReaction;
use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class Article extends Component
{
    use WithPagination, WithReaction;

    #[Locked]
    public int $userId;
    public bool $sort = true;
    public string $search = '';
    public int $articlesTotal = 0;

    public function mount()
    {
        $this->userId = UserRepository::getAuthId();
    }

    #[Computed]
    public function articles(): \Illuminate\Contracts\Pagination\Paginator
    {
        $articleData = TenantArticle::with(['reactions', 'content'])
            ->where('active', 1)
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

        $this->articlesTotal = $articleData->total();

        return ArticleData::collection($articleData)->items();
    }




    #[On('onInputSearchArticleFocusout')]
    public function onInputSearchArticleFocusout()
    {
        if (strlen($this->search) > 3)
            $this->dispatch('onAmplitudeSearch',$this->search,$this->articlesTotal);
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function direction()
    {
        $this->sort = !$this->sort;
        $this->dispatch('onAmplitudeIsSorted', $this->sort);
    }

    public function render(): View
    {
        return view('lk::livewire.article');
    }
}
