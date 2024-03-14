<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\My\Data\User\DocumentData;
use Modules\My\Data\User\UserAttributesData;
use Modules\My\Entities\Document;
use Modules\My\Entities\User;
use Modules\My\Entities\UserAttributes;
use Modules\My\Events\ProfileUpdatedEvent;
use Modules\My\Repositories\UserRepository;

class Settings extends Component
{

    public int $userId;
    public int $ff = 1;
    public $userAttributes = null;

    public mixed $cleaning;
    public bool $master;

    public function __construct()
    {
        $this->userId = UserRepository::getAuthId();
    }

    public array $files = [
        ['title' => 'Соглашение о конфиденциальности.pdf','link' => 'files/sample.pdf'],
        ['title' => 'Соглашение о других очень важных шт...pdf','link' => 'files/sample.pdf'],
        ['title' => 'Соглашение о конфиденциальности.pdf','link' => 'files/sample.pdf'],
    ];

    protected $rules = [
        'userAttributes.cleaning' => 'required',
        'userAttributes.master' => 'required',
        'userAttributes.email_notification' => 'required',
        'userAttributes.sms_notification' => 'required',
    ];


    #[Computed]
    public function getUserAttributes()
    {
        return UserRepository::getUserAttributes();
    }

    public function updatedUserAttributes()
    {
        $this->userAttributes->save()
            ? $this->dispatch('onNotify', header: __('common-save-success'), timeout: 2000)
            : $this->dispatch('onError', header: __('common-save-error'), timeout: 2000);

        event(new ProfileUpdatedEvent($this->userId));
    }

    public function getFiles(): Enumerable
    {
        return DocumentData::collection(Document::all())->toCollection();
    }

    public function getApiFiles()
    {
        return  app(CrmMyApi::class)
            ->documentGet(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            );
    }


    public function mount() {
        $this->userAttributes = UserRepository::getUserAttributes();
    }


    public function render(): View
    {
        return view('my::livewire.settings',[
            'files' => $this->getFiles(),
            'apiFiles' => $this->getApiFiles(),
        ]);
    }
}
