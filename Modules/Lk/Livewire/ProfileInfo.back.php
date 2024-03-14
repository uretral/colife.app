<?php

namespace Modules\Lk\Livewire;


use App\Services\Amplitude\Handle\AmplitudeSave;
use Modules\Lk\Entities\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Modules\Lk\Data\Form\SelectOptionData;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Entities\UserInterest;
use Modules\Lk\Entities\UserPosition;
use Modules\Lk\Events\Amplitude\AmplitudeSaveEvent;
use Modules\Lk\Events\ProfileUpdatedEvent;
use Modules\Lk\Jobs\Amplitude\AmplitudeProfileAdditionalInfoSaveJob;
use Modules\Lk\Repositories\UserRepository;

class ProfileInfoBack extends Component
{

    /*    public function __construct($id = null)
        {
            parent::__construct($id);
            $this->userId = UserRepository::getAuthId();
            $this->getUserData();
        }*/

    public $user;

    public int $limit = 12;
    public int $limitBack = 12;

    //models
    public ?int $position = null;
    public ?string $selfDescription = null;


    //eof models

    public function viewAll()
    {
        $this->limit = 10000;
    }

    public function viewLess()
    {
        $this->limit = $this->limitBack;
    }

    public function getPositions(): Enumerable
    {
        return SelectOptionData::collection(UserPosition::whereActive(1)->get())->toCollection();
    }


    public function getInterests(): Enumerable
    {
        return SelectOptionData::collection(UserInterest::where('active', 1)->get())->toCollection();
    }


    protected array $rules = [
        'user.attributes.position_id' => '',
        'user.attributes.about' => '',
        'user.attributes.interests' => '',
        'user.attributes.telegram' => '',
        'user.attributes.facebook' => '',
        'user.attributes.instagram' => '',
        'user.attributes.vkontakte' => '',
    ];

    public function save()
    {
        $this->validate();
        $this->user->attributes->save()
            ? $this->emit('onNotify', ['header' => __('common-save-success'), 'timeout' => 2000])
            : $this->emit('onError', ['header' => __('common-save-error'), 'timeout' => 2000]);

        event(new ProfileUpdatedEvent($this->user->id));

        AmplitudeProfileAdditionalInfoSaveJob::dispatch($this->user);
    }


    public function mount()
    {
        $this->user = auth()->user();
        if (is_null($this->user->attributes->interests)) {
            $this->user->attributes->update([
                'interests' => []
            ]);
        }
    }

    public function render(): View
    {
        return view('lk::livewire.profile-info', [
            'positions' => $this->getPositions(),
            'interests' => $this->getInterests(),
            'limit' => $this->limit,
            'user' => $this->user,
        ]);
    }
}
