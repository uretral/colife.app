<?php

namespace Modules\Lk\Livewire;

use Modules\Lk\Http\Controllers\AppealController;
use Modules\Lk\Data\Appeal\AppealData;
use Modules\Lk\Data\Appeal\AppealMessageData;
use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\AppealMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Lk\Events\TenantAppealMessageCreatedEvent;
use Modules\Lk\Events\TenantAppealRateCreatedEvent;
use Modules\Lk\Jobs\Amplitude\AmplitudeCreateRequestJob;
use Modules\Lk\Repositories\UserRepository;
use Illuminate\Validation\Validator;

class Appeals extends Component
{
    use WithFileUploads;

    public int    $userId;
    public        $files = [];
    public string $txt   = '';

    // finished
    public string $comment = '';
    public ?int   $score   = null;
    public string $search  = '';

    public bool $finished = false;

    protected $rules = [
        'txt'     => 'required|min:2',
        'files.*' => 'max:100000',
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->userId = UserRepository::getAuthId();
    }

    public function getListeners()
    {
        $appeals = $this->getAppeals();
        $appeals->each(
            function (AppealData $appeal) {
                $event = "echo-private:appeals.{$appeal->id},.appealUpdated";
                $this->listeners[$event] = 'broadcastedNotifications';
            }
        );
        return $this->listeners;
    }

    public function broadcastedNotifications($event)
    {
        $this->getAppeals();
        $this->getChatMessages();
        $this->emit("onSwitcherUpdate");
    }

    public function updatedScore($value)
    {
        $this->score = $value;
    }

    public function ratingSubmit()
    {
        // метод для сохранения результатов $comment & $score
        $appeal = $this->appealsBuilder()->where('active', 1)->first();
        $appeal->score = $this->score;
        $appeal->status_id = 3;

        $appeal->save();

        // Отправка события
        TenantAppealRateCreatedEvent::dispatch($appeal);
    }

    public function updatedFiles()
    {
        $this->withValidator(
            function (Validator $validator) {
                if ($validator->fails()) {
                    $this->reset('files');
                }
            }
        )->validateOnly('files.*');
    }


    protected ?AppealData $activeAppeal = null;

    public function onCustomEvent($e)
    {
        $this->dispatchBrowserEvent($e);

        if ($e === 'modal') {
            AmplitudeCreateRequestJob::dispatch();
        }
    }

    public function appealsBuilder(): Builder|Appeal|\Illuminate\Database\Query\Builder
    {
        return Appeal::whereHas(
            'messages',
            function ($message) {
                $message->where('author_id', $this->userId);
            }
        )->whereHas(
            'messages',
            function ($message) {
                $message->when(
                    strlen($this->search) > 3,
                    function ($query) {
                        $query
                            ->where('message', 'like', '%' . $this->search . '%');
                    }
                );
            }
        )->withCount(
            [
                'messages as hasUnread' => function (Builder $query) {
                    $query->whereRead(0);
                }
            ]
        )
            ->orderBy('hasUnread', 'desc')
            ->orderBy('created_at', 'desc');
    }

    public function getAppeals(): Enumerable
    {
        $appeals = $this->appealsBuilder()->get();
        $appeal = $this->appealsBuilder()->where('active', 1)->first();
        $appeal?->messages()->update(['read' => true]);
        $this->emit("onSwitcherUpdate");
        $this->score = $appeal->score ?? null;

        if ($appeal || !empty($appeals[0])) {
            $this->activeAppeal = AppealData::from($appeal ?? $appeals[0]);
            return AppealData::collection($appeals)->toCollection();
        }

        return collect([]);
    }

    public function getChatMessages(): Enumerable
    {
        if ($this->activeAppeal) {
            $appealMessages = AppealMessageData::collection(
                AppealMessage::whereAppealId($this->activeAppeal->id)->get()
            )->toCollection();

            $this->finished = !is_null($appealMessages->where('message', '=', '#appeal_rate')->first());

            return $appealMessages;
        }
        return collect([]);
    }

    public function setActiveChat($id = null)
    {
        // Что то нужно с этим блоком делать?
        $lastActive = $this->appealsBuilder()->where('active', 1)->first();
        $lastActive?->update(['active' => 0]);
        if ($id) {
            Appeal::whereId($id)->update(['active' => 1]);
        }

        $activeAppeal = $this->appealsBuilder()->where('active', 1)->first();
        $activeAppeal?->messages()->update(['read' => true]);
        $this->activeAppeal = AppealData::from($activeAppeal);
        $this->emit("onSwitcherUpdate");
        $this->txt = '';
        $this->files = [];
        $this->resetValidation(['txt', 'files']);
    }

    public function getUserData($userId)
    {
        return $this->activeAppeal->users->where('id', '==', $userId)->first();
    }

    public function saveAppeal(AppealController $controller, $txt = false)
    {
        $this->txt = (string)preg_replace(
            '~^\s+|\s+$~u',
            '',
            strip_tags(html_entity_decode($txt, ENT_QUOTES, 'UTF-8'))
        );
        $this->validate();

        $appeal = $this->appealsBuilder()->where('active', 1)->first();
        $activeAppeal = AppealData::from($appeal);

        $message = $controller->createMessage(
            AppealMessageData::from(
                [
                    'author_id' => $this->userId,
                    'appeal_id' => $activeAppeal->id,
                    'message'   => $this->txt,
                    'read'      => true,
                    'files'     => $this->files
                ]
            )
        );


        // Отправка события
        TenantAppealMessageCreatedEvent::dispatch($appeal, $message);

        $this->txt = '';
        $this->files = [];

        $this->setActiveChat($activeAppeal->id);
    }

    public function clearFile()
    {
        $this->reset('files');
    }

    public function clearSearch()
    {
        $this->search = '';
    }


    public function render(): View
    {
        $payloads = [
            'appeals'        => $this->getAppeals(),
            'activeAppeal'   => $this->activeAppeal,
            'appealMessages' => $this->getChatMessages(),
            'finished'       => $this->finished
        ];

        return !empty($this->search) || $payloads['appeals']->count()
            ? view('lk::livewire.appeals', $payloads)
            : view('lk::livewire.appeals-empty');
    }
}
