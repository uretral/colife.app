<?php

namespace Modules\Lk\Livewire;

use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\User\DocumentData;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Entities\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Modules\Lk\Repositories\UserRepository;

class UserSettings extends Component
{

    public UserData $user;


    public function mount()
    {
        $this->user = UserData::from(UserRepository::getAuthUser());
    }

    public function updatedUser()
    {
        $this->user->attributes->createOrUpdate()
            ? $this->dispatch('onNotify', ['header' => __('common-save-success'), 'timeout' => 2000])
            : $this->dispatch('onError', ['header' => __('common-save-error'), 'timeout' => 2000]);

    }

    #[Computed]
    public function userFiles(): ?array
    {
        try {
            return Document::whereSlug("settings.documents")->first()
                ?->files()->get()->toArray();
        } catch (\Exception $e) {
            Log::critical("Отсутствуют документы жильца: " . $e->getMessage());
            return [];
        }
    }

    #[Computed]
    public function files(): Enumerable
    {
        return DocumentData::collection(Document::all())->toCollection();
    }


    #[Computed]
    public function apiFiles()
    {
        return app(CrmLkApi::class)
            ->documentGet(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            );
    }


    public function render(): View
    {
        return view('lk::livewire.user-settings');
    }
}
