<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeNewsInteraction;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Lk\Data\Article\ArticleData;
use Modules\Lk\Data\Article\ArticleReactionData;
use Modules\Lk\Entities\Article;
use Modules\Lk\Entities\ArticleReaction;
use Modules\Lk\Entities\ArticleReactionUser;
use Modules\Lk\Jobs\Amplitude\AmplitudeNewsInteractionJob;
use Modules\Lk\Livewire\Traits\WithReaction;
use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class ArticlePage extends Component
{
    use WithReaction;

    #[Locked]
    public int $userId;

    #[Locked]
    public int $articleId;

    public function mount()
    {
        $this->userId = UserRepository::getAuthId();
        $this->articleId = request('id');
    }

    #[Computed]
    public function article(): ArticleData
    {
        if(!$article = Article::with(['reactions', 'content'])->find( $this->articleId)) {
            abort(404,__('article-page-404'));
        }
        return ArticleData::from($article);
    }

    public function render(): View
    {
        return view('lk::livewire.article-page');
    }
}
