<?php

namespace Modules\Lk\Livewire\Form;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class AvatarForm extends Form
{
    use WithFileUploads;

    #[Validate('image|max:1024')] // 1MB Max
    public $photo;

    public function store() {
        $this->validate();
        $this->photo->store(path: 'avatars');
    }

}
