<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeGoToBonus;
use Livewire\Attributes\Locked;
use Modules\Lk\Data\Notifications\PasswordNotification;
use Modules\Lk\Entities\File;
use Modules\Lk\Entities\User;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Data\User\UserDeleteReasonData;
use Modules\Lk\Entities\UserDeleteReason;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Modules\Lk\Enums\NotificationTypeEnum;
use Modules\Lk\Helpers\TenantHelper;
use Modules\Lk\Http\Controllers\UserController;
use Modules\Lk\Jobs\Amplitude\AmplitudeChangePasswordJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeDeleteProfileJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeGoToBonusJob;
use Modules\Lk\Livewire\Form\AvatarForm;
use Modules\Lk\Livewire\Form\ProfileCardDeleteForm;
use Modules\Lk\Livewire\Form\ProfileCardPasswordForm;
use Modules\Lk\Livewire\Form\ProfileCardUserForm;
use Modules\Lk\Repositories\UserRepository;
use Livewire\WithFileUploads;

class ProfileCardBack extends Component
{
    use WithFileUploads;

    #[Locked]
    public UserData $user;
    public ProfileCardUserForm $profileCardUser;
    public ProfileCardDeleteForm $profileCardDelete;
    public ProfileCardPasswordForm $profileCardPassword;



    /*------------*/

    public $password = '';
    public $newPassword = '';
    public $reason;
    public $reasonOther = 5;
    public $reasonText = '';
//    public $avatar;
    protected $noticeType;




    public function mount() {

        $this->user = UserData::from(UserRepository::getAuthUser());
//        dump($this->user);
        $this->noticeType = NotificationTypeEnum::Success()->label;
    }

    /*---------------*/


/*    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = UserRepository::getAuthUser();
        $this->noticeType = NotificationTypeEnum::Success()->label;
    }*/

    protected $listeners = [
        'onBonusBtnClicked'
    ];

    public function onChangePassModal($state = true)
    {
        $this->dispatchBrowserEvent('onChangePass', [$state]);
    }

    public function onDeleteProfileModal($state = true)
    {
        $this->dispatchBrowserEvent('onDeleteProfile', [$state]);
    }

    /**
     * @throws \Exception
     */
    public function updatedAvatar()
    {
        $this->validate(
            [
                'avatar' => 'image|max:10024',
            ]
        );
        TenantHelper::updateUserAvatar($this->avatar);

        $this->dispatch('onAvatarUploaded', $this->avatar->temporaryUrl());
    }


    public function getUserData(): UserData|null
    {
        return UserData::from(User::where('id', $this->user->id)->first());
    }

    public function getReasons(): Enumerable
    {
        return UserDeleteReasonData::collection(UserDeleteReason::whereActive(1)->get())->toCollection();
    }

    public function submitChangePass(UserController $controller)
    {
        $this->validate(
            [
                'password' => 'required|min:8',
                'newPassword' => 'required|min:8',
            ]
        );

        $data = $controller->changePassword($this->password, $this->newPassword);

        if ($data) {
            $this->onChangePassModal(false);
            AmplitudeChangePasswordJob::dispatch(['is_success' => true]);
        } else {
            $this->noticeType = NotificationTypeEnum::Error()->label;
            AmplitudeChangePasswordJob::dispatch(['is_success' => false]);
        }

        /*app/Http/Livewire/Layout/EventNotifier.php
         * onNotify - заголовок + текст (если указать)
         * onConfirm - аналог js confirm
         * onError - заголовок + текст (если указать)
         * */
        $notice = PasswordNotification::from(['type' => $this->noticeType]);
        $this->dispatch($notice->event, $notice->toArray());
    }

    public function submitDeleteProfile()
    {
        $this->validate(
            [
                'reason' => 'required',
                'reasonText' => '',
            ]
        );

        AmplitudeDeleteProfileJob::dispatch();

        // + Событие на отправку в Битрикс информации об удалении
        if (UserRepository::deleteUser($this->reason, $this->reasonText))
            $this->redirect(route('lk.login'));

    }

    public function onBonusBtnClicked()
    {
        /* Событие Amplitude - Переход на страницу бонусов */
        AmplitudeGoToBonusJob::dispatch();
    }

    public function render(): View
    {
        return view(
            'lk::livewire.profile-card',
            [
                'reason' => $this->reason,
                'reasonText' => $this->reasonText,
                'reasonOther' => $this->reasonOther,
                'password' => $this->password,
                'newPassword' => $this->newPassword,
                'reasons' => $this->getReasons(),
                'avatard' => File::where('model_id', $this->user->id)->where('type', 'avatar')->first()
            ]
        );
    }
}
