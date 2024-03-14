<?php

namespace Modules\My\Livewire\Forms;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\My\Data\User\UserShortData;
use Modules\My\Entities\User;
use Modules\My\Entities\UserDeleteReason;
use Modules\My\Repositories\UserRepository;

class ProfileCardPasswordForm extends Form
{
    #[Rule('required|min:6')]
    public $password = '';

    #[Rule('required|min:6')]
    public $newPassword = '';

    public int $userId;

    public function set(UserShortData $user)
    {
        $this->userId = $user->id;
    }

    public function open()
    {
        $this->component->dispatch('onChangePass', open: true);
    }

    public function close()
    {
        $this->component->dispatch('onChangePass', open: false);
    }

    public function submit()
    {
        $data = $this->validate([
            'password' => 'required|min:6',
            'newPassword' => 'required|min:6',
        ]);

        // здесь ссылка на внутренний метод - так как это пароль)
        // а пока заглушка
        if ($data) {

            /*app/Http/Livewire/Layout/EventNotifier.php
             * onNotify - заголовок + текст (если указать)
             * onConfirm - аналог js confirm
             * onError - заголовок + текст (если указать)
             * */
            $this->component->dispatch('onNotify', [
                'header' => 'Пароль  изменен',
                'body' => "Расскажите немного о себе, чтобы что-то. И еще вот это, расскажите, короче, надо так",
                'timeout' => 5000
            ]);
            $this->close();
        }
    }

}
