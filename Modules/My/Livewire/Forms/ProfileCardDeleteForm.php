<?php

namespace Modules\My\Livewire\Forms;

use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\My\Data\User\UserDeleteReasonData;
use Modules\My\Entities\UserDeleteReason;
use Modules\My\Repositories\UserRepository;

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
    public function reasons(): Enumerable
    {
        return UserDeleteReasonData::collection(UserDeleteReason::all())->toCollection();
    }

    public function delete()
    {
        // + Событие на отправку в Битрикс информации об удалении
        if (UserRepository::deleteUser($this->reason, $this->reasonText))
            $this->component->redirect(route('my.login'));
    }

}
