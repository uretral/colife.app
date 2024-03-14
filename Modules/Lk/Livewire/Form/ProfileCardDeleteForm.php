<?php

namespace Modules\Lk\Livewire\Form;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\Lk\Data\User\UserDeleteReasonData;
use Modules\Lk\Entities\UserDeleteReason;
use Modules\Lk\Repositories\UserRepository;

class ProfileCardDeleteForm extends Form
{
    #[Rule('required')]
    public $reason;
    #[Rule('')]
    public $reasonText = '';
    public $reasonOther = 5;

    public function open()
    {
        $this->component->dispatch('onDeleteProfile', open: true);
    }

    public function close()
    {
        $this->component->dispatch('onDeleteProfile', open: false);
    }

    #[Computed]
    public function reasons(): \Illuminate\Support\Enumerable
    {
        return UserDeleteReasonData::collection(UserDeleteReason::all())->toCollection();
    }

    public function delete()
    {
        $this->validate(
            [
                'reason' => 'required',
                'reasonText' => '',
            ]
        );

        $this->component->dispatch('onDeleteProfile');

        // + Событие на отправку в Битрикс информации об удалении
        if (UserRepository::deleteUser($this->reason, $this->reasonText))
            $this->component->redirect(route('lk.login'));
    }
}
