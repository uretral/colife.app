<?php

namespace Modules\My\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\My\Entities\Appeal;
use Modules\My\Events\MyAppealRateCreatedEvent;

class AppealRatingForm extends Form
{
    public int $rating = 0;
    public string $comment = '';

    public function save(Appeal $appeal)
    {
        if($this->rating > 0) {
            $this->clearActive();
            $appeal->score = $this->rating;
            $appeal->status_id = 3;
            $appeal->active = 1;
            $appeal->save();
            MyAppealRateCreatedEvent::dispatch($appeal);
        } else {
            $this->component->dispatch('onError',['header' => __('appeal-rating-required')]);
        }
    }


    public function clearActive() {
        Appeal::whereActive(1)->update(['active' => 0]);
    }

}
