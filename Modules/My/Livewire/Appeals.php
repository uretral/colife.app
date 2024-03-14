<?php

namespace Modules\My\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Modules\My\Http\Controllers\AppealController;
use Modules\My\Data\Appeal\AppealData;
use Modules\My\Data\Appeal\AppealMessageData;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\AppealMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\My\Events\MyAppealMessageCreatedEvent;

use Modules\My\Livewire\Forms\AppealRatingForm;
use Modules\My\Repositories\UserRepository;

class Appeals extends Component
{
    use WithFileUploads;

    public int $userId;
    public $files = [];
    public string $txt = '';

    public AppealRatingForm $ratingForm;

    public string $comment = '';
    public ?int $score = null;
    public string $search = '';

    public  $val = null;

    public function __construct($id = null)
    {
        $this->userId = UserRepository::getAuthId();
    }

    public function getListeners()
    {
        $appeals = $this->getAppeals();
        $appeals->each(
            function (AppealData $appeal) {
                $event = "echo-private:my.appeals.{$appeal->id},.myAppealUpdated";
                $this->listeners[$event] = 'broadcastedNotifications';
            }
        );
        return $this->listeners;
    }

    public function broadcastedNotifications($event)
    {
        $this->getAppeals();
        $this->getMessages();
        $this->dispatch("onSwitcherUpdate");
    }

    public function ratingSubmit()
    {
        $appeal = $this->appealsBuilder()->where('active', 1)->first();
        $this->ratingForm->save($appeal);
        $this->setActiveChat();
    }

    protected $rules = [
        'txt' => 'required|min:2',
        'files.*' => 'max:100000',
    ];

    protected ?AppealData $activeAppeal = null;

/*    public function onAppealModal()
    {

        $this->dispatch('onAppealOpen', open: true);

    }*/

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
        $this->dispatch("onSwitcherUpdate");;
        $this->score = $appeal->score ?? null;

        if ($appeal || !empty($appeals[0])) {
            $this->activeAppeal = AppealData::from($appeal ?? $appeals[0]);
            return AppealData::collection($appeals)->toCollection();
        }

        return collect([]);
    }

    public function getMessages(): Enumerable
    {
        if ($this->activeAppeal) {
            return AppealMessageData::collection(
                AppealMessage::whereAppealId($this->activeAppeal->id)->get()
            )->toCollection();
        }
        return collect([]);
    }

    public function setActiveChat($id = null)
    {
        // Что то нужно с этим блоком делать?
        $lastActive = $this->appealsBuilder()->where('active', 1)->first();
        $lastActive?->update(['active' => 0]);
        if ($id)
            Appeal::whereId($id)->update(['active' => 1]);

        $activeAppeal = $this->appealsBuilder()->where('active', 1)->first();
        $activeAppeal?->messages()->update(['read' => true]);
        if ($activeAppeal) {
            Log::info("Appeal test", ['active' => $activeAppeal]);
            $this->activeAppeal = AppealData::from($activeAppeal);
        }

        $this->ratingForm->rating = $this->activeAppeal->score ?? 0;
        $this->dispatch("onSwitcherUpdate");;
    }

    public function getUserData($userId)
    {
        return $this->activeAppeal->users->where('id', '==', $userId)->first();
    }

    public function saveAppeal(AppealController $controller)
    {
        $appeal = $this->appealsBuilder()->where('active', 1)->first();
        $activeAppeal = AppealData::from($appeal);

        $message = $controller->createMessage(
            AppealMessageData::from(
                [
                    'author_id' => $this->userId,
                    'appeal_id' => $activeAppeal->id,
                    'message' => $this->txt,
                    'read' => true,
                    'files' => $this->files
                ]
            )
        );

        // Отправка события
        MyAppealMessageCreatedEvent::dispatch($appeal, $message);

        $this->txt = '';
        $this->files = [];

        $this->setActiveChat($appeal->id);
    }

    public function clearSearch()
    {
        $this->search = '';
    }


    public function render(): View
    {

        $payloads = [
            'appeals' => $this->getAppeals(),
            'activeAppeal' => $this->activeAppeal,
            'messages' => $this->getMessages()->where('message', '!=', config('my.rateable')),
            'finished' => $this->getMessages()->where('message', '==', config('my.rateable'))->count() > 0
        ];

        return !empty($this->search) || $payloads['appeals']->count()
            ? view('my::livewire.appeals', $payloads)
            : view('my::livewire.appeals-empty');
    }
}
