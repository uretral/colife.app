<?php

namespace Modules\My\Traits\Livewire;

use Illuminate\Support\Enumerable;
use Modules\My\Data\Article\ArticleReactionData;
use Modules\My\Entities\ArticleReaction;
use Modules\My\Entities\ArticleReactionUser;
use Modules\My\Repositories\UserRepository;

trait NewsProps
{

    public int $userId;
    public bool $sort = true;
    public string $search = '';

    public function direction(): void
    {
        $this->sort = !$this->sort;
    }

    public function getReactions(): Enumerable
    {
        return ArticleReactionData::collection(ArticleReaction::all())->toCollection();
    }

    public function addReaction($articleId, $reactionId): void
    {
        ArticleReactionUser::updateOrCreate([
            'article_id' => $articleId,
            'reaction_id' => $reactionId,
            'user_id' => $this->userId,
        ]);
    }

    public function removeReaction($articleId, $reactionId): void
    {
        ArticleReactionUser::where('article_id', $articleId)
            ->where('reaction_id', $reactionId)
            ->where('user_id', $this->userId)
            ->delete();
    }


    public function mount():void
    {
        $this->userId = UserRepository::getAuthId();
    }

}
