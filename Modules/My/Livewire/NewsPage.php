<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\My\Data\Article\ArticleData;
use Modules\My\Data\Article\ArticleReactionData;
use Modules\My\Entities\Article;
use Modules\My\Entities\ArticleReaction;
use Modules\My\Entities\ArticleReactionUser;
use Modules\My\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class NewsPage extends Component
{

    public int $userId;
    public ?int $articleId = null;

    public function getArticle(): ArticleData
    {
        $article = Article::with(['reactions', 'content'])->find(\session('article_id'));
        if (!$article) {
            abort(404, __('article-page-404'));
        }
        return ArticleData::from($article);
    }

    public function getReactions(): DataCollection
    {
        return ArticleReactionData::collection(ArticleReaction::all());
    }

    public function addReaction($articleId, $reactionId)
    {
        ArticleReactionUser::updateOrCreate([
            'article_id' => $articleId,
            'reaction_id' => $reactionId,
            'user_id' => $this->userId,
        ]);
    }


    public function removeReaction($articleId, $reactionId)
    {
        ArticleReactionUser::where('article_id', $articleId)
            ->where('reaction_id', $reactionId)
            ->where('user_id', $this->userId)
            ->delete();
    }

    public function mount()
    {
        $this->userId = UserRepository::getAuthId();
        \session()->put('article_id', request()->segment(2));
    }

    public function render() : View
    {
        return view('my::livewire.news-page', [
            'article' => $this->getArticle(),
            'userId' => $this->userId,
            'reactions' => $this->getReactions(),
        ]);
    }
}
