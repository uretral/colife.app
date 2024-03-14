<?php

namespace Modules\My\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\Request;
use Modules\My\Events\MyRequestCreatedEvent;

class RequestRatingForm extends Form
{
    public int $rating = 0;
    public string $comment = '';

    public function save(Request $request)
    {
        if($this->rating > 0) {
            $this->clearActive();
            $request->score = $this->rating;
            $request->status_id = 3;
            $request->active = 1;
            $request->save();
            MyRequestCreatedEvent::dispatch($request);
        } else {
            $this->component->dispatch('onError',['header' => __('appeal-rating-required')]);
        }
    }


    public function clearActive() {
        Request::whereActive(1)->update(['active' => 0]);
    }

}
