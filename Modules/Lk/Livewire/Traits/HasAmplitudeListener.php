<?php

namespace Modules\Lk\Livewire\Traits;

use Livewire\Attributes\On;
use Modules\Lk\Console\Log;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Entities\ArticleReaction;
use Modules\Lk\Jobs\Amplitude\AmplitudeAddPhotoJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeChangePasswordJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeDeleteProfileJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeDocumentDownloadJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeGoToBonusJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeIsCleaningJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeIsMasterJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeIsNotificationEmailJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeIsNotificationSmsJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeIsSortedJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeNewsInteractionJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeProfileAdditionalInfoSaveJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeSearchFormActivatedJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeSearchJob;

trait HasAmplitudeListener
{
    /*ARTICLES*/

    #[On('onInputSearchArticleClick')]
    public function onInputSearchArticleClick(): void
    {
        AmplitudeSearchFormActivatedJob::dispatch();
    }

    #[On('onArticleTitleClicked')]
    public function onArticleTitleClicked($id): void
    {
        $article = \Modules\Lk\Entities\Article::find($id);

        AmplitudeNewsInteractionJob::dispatch([
            'topic' => $article->title,
            'published_at' => $article->updated_at,
            'is_full_mode' => false,
            'reactions_used' => 'none',
            'reaction_action' => 'none'
        ]);
    }

    #[On('onReactionClicked')]
    public function onReactionClicked($articleId, $reactionId, $state, $mode = false): void
    {
        $article = \Modules\Lk\Entities\Article::find($articleId);
        $articleReaction = ArticleReaction::find($reactionId);
        AmplitudeNewsInteractionJob::dispatch([
            'topic' => $article->title,
            'published_at' => $article->updated_at,
            'is_full_mode' => $mode,
            'reactions_used' => $articleReaction->title,
            'reaction_action' => $state ? 'added' : 'removed'
        ]);
    }

    #[On('onAmplitudeIsSorted')]
    public function onAmplitudeIsSorted($sort): void
    {
        AmplitudeIsSortedJob::dispatch(['sort_type' => $sort ? 'old' : 'new']);
    }

    #[On('onAmplitudeSearch')]
    public function onAmplitudeSearch($searchString, $total): void
    {
        AmplitudeSearchJob::dispatch([
            'search_request' => $searchString,
            'search_results' => $total
        ]);
    }

    /*PROFILE*/

    #[On('onChangeAvatarImage')]
    public function onChangeAvatarImage($page): void
    {
        AmplitudeAddPhotoJob::dispatch(['page' => $page]);
    }

    #[On('onBonusBtnClicked')]
    public function onBonusBtnClicked(): void
    {
        AmplitudeGoToBonusJob::dispatch();
    }

    #[On('onChangePassword')]
    public function onChangePassword(bool $state): void
    {
        AmplitudeChangePasswordJob::dispatch(['is_success' => $state]);
    }

    #[On('onDeleteProfile')]
    public function onDeleteProfile(): void
    {
        AmplitudeDeleteProfileJob::dispatch();
    }

    #[On('onProfileAdditionalInfoUpdated')]
    public function onProfileAdditionalInfoUpdated(UserData $userData): void
    {
        AmplitudeProfileAdditionalInfoSaveJob::dispatch($userData);
    }

    #[On('onSettingsChangeEmail')]
    public function onSettingsChangeEmail($value): void
    {
        AmplitudeIsNotificationEmailJob::dispatch(['is_enabled' => $value]);
    }

    #[On('onSettingsChangeSms')]
    public function onSettingsChangeSms($value): void
    {
        AmplitudeIsNotificationSmsJob::dispatch(['is_enabled' => $value]);
    }

    #[On('onSettingsChangeCleaning')]
    public function onSettingsChangeCleaning($value): void
    {
        AmplitudeIsCleaningJob::dispatch(['is_enabled' => $value]);
    }

    #[On('onSettingsChangeMaster')]
    public function onSettingsChangeMaster($value): void
    {
        AmplitudeIsMasterJob::dispatch(['is_enabled' => $value]);
    }

    #[On('onUserDocumentDownload')]
    public function onUserDocumentDownload($link = null, $title = null): void
    {
        AmplitudeDocumentDownloadJob::dispatch([
            'topic' => $title,
            'document_type' => $link ? pathinfo($link)['extension'] : null
        ]);
    }


}
