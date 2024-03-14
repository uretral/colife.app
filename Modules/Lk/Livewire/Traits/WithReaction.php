<?php

namespace Modules\Lk\Livewire\Traits;

use Livewire\Attributes\Computed;
use Modules\Lk\Data\Article\ArticleReactionData;
use Modules\Lk\Entities\ArticleReaction;
use Modules\Lk\Entities\ArticleReactionUser;
use Spatie\LaravelData\DataCollection;

trait WithReaction
{

    #[Computed]
    public function reactions(): DataCollection
    {
        return ArticleReactionData::collection(ArticleReaction::whereActive(1)->get());
    }

    public function addReaction($articleId, $reactionId): void
    {
        ArticleReactionUser::updateOrCreate([
            'article_id' => $articleId,
            'reaction_id' => $reactionId,
            'user_id' => $this->userId,
        ]);
        $this->dispatch('onReactionClicked',$articleId, $reactionId, true);
    }

    public function removeReaction($articleId, $reactionId): void
    {
        ArticleReactionUser::where('article_id', $articleId)
            ->where('reaction_id', $reactionId)
            ->where('user_id', $this->userId)
            ->delete();
        $this->dispatch('onReactionClicked',$articleId, $reactionId, false);
    }
}
