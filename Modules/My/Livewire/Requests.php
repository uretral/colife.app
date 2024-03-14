<?php

namespace Modules\My\Livewire;

use App\Helpers\Helper;
use App\Services\Bitrix\Helpers\BitrixHelper;
use Modules\My\Data\Request\CreateBitrixRequestData;
use Modules\My\Data\Request\RequestBitrixData;
use Modules\My\Entities\RequestBitrix;
use Modules\My\Entities\RequestMessage;
use Modules\My\Http\Controllers\AppealController;
use Modules\My\Data\Request\RequestData;
use Modules\My\Data\Request\RequestMessageData;
use Modules\My\Entities\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\My\Events\MyRequestMessageCreatedEvent;
use Modules\My\Events\MyRequestRateCreatedEvent;
use Modules\My\Http\Controllers\RequestController;
use Modules\My\Livewire\Forms\RequestRatingForm;
use Modules\My\Repositories\UserRepository;

class Requests extends Component
{
    use WithFileUploads;

    public int    $userId;
    public        $files = [];
    public string $txt   = '';

    public RequestRatingForm $ratingForm;

    // finished
    public string $comment = '';
    public ?int   $score   = null;
    public string $search = '';
//    public bool $finished = false;
    const FINISHED = '#appeal_rate';


    public function __construct($id = null)
    {
        $this->userId = UserRepository::getAuthId();
    }

    public function getListeners()
    {
        $requests = $this->getRequests();
        $requests->each(
            function (RequestData $request) {
                $event = "echo-private:my.request.{$request->id},.myRequestUpdated";
                $this->listeners[$event] = 'broadcastedNotifications';
            }
        );
        return $this->listeners;
    }

    public function broadcastedNotifications($event)
    {
        $this->getRequests();
        $this->getRequestsMessages();
        $this->dispatch("onSwitcherUpdate");
    }

    public function ratingSubmit()
    {
        // метод для сохранения результатов $comment & $score
        $request = $this->requestsBuilder()->where('active', 1)->first();
        $this->ratingForm->save($request);


        // Отправка события
//        MyRequestRateCreatedEvent::dispatch($request);
    }

    protected $rules = [
        'txt'     => 'required|min:2',
        'files.*' => 'max:100000',
    ];

    protected ?RequestData $activeRequest = null;

    public function onAppealModal()
    {
        $this->dispatch('onAppealOpen',open: true);
    }

    public function requestsBuilder(): Builder|Request|\Illuminate\Database\Query\Builder
    {
        return Request::whereHas(
            'messages',
            function ($message) {
                $message->where('author_id', $this->userId)->orWhere('author_id',Helper::getMySupportUserId());
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
            ->orderBy('hasUnread','desc')
            ->orderBy('created_at','desc');

    }

    public function getRequests(): Enumerable
    {
        $requests = $this->requestsBuilder()->get();
        $request = $this->requestsBuilder()->where('active', 1)->first();
        $request?->messages()->update(['read'=> true]);
        $this->dispatch("onSwitcherUpdate");;
        $this->score = $request->score ?? null;

        if ($request || !empty($requests[0])) {
            $this->activeRequest = RequestData::from($request ?? $requests[0]);
            return RequestData::collection($requests)->toCollection();
        }

        return collect([]);
    }



    public function setActiveChat($id = null)
    {
        // Что то нужно с этим блоком делать?
        $lastActive = $this->requestsBuilder()->where('active', 1)->first();
        $lastActive?->update(['active' => 0]);
        if ($id)
            Request::whereId($id)->update(['active' => 1]);

        $activeRequest = $this->requestsBuilder()->where('active', 1)->first();
        $activeRequest?->messages()->update(['read'=> true]);
        $this->activeRequest = RequestData::from($activeRequest);
        $this->dispatch("onSwitcherUpdate");;
    }

    public function getUserData($userId)
    {
        return $this->activeRequest->users->where('id', '==', $userId)->first();
    }


    public function saveRequest(RequestController $controller, $txt = false)
    {
        $this->txt = (string) preg_replace('~^\s+|\s+$~u', '', strip_tags(html_entity_decode($txt, ENT_QUOTES, 'UTF-8')));
//        $this->validate([
//            'txt' => 'required|string|min:3',
//            'files.*' => 'image|max:10024',
//        ]);

        $request = $this->requestsBuilder()->where('active', 1)->first();
        $activeRequest = RequestData::from($request);

        $message = $controller->createMessage(
            RequestMessageData::from(
                [
                    'author_id' => $this->userId,
                    'request_id' => $activeRequest->id,
                    'message'   => $this->txt,
                    'read'      => true,
                    'files'     => $this->files
                ]
            )
        );

        // Отправка события
        MyRequestMessageCreatedEvent::dispatch($request, $message);

        $this->txt = '';
        $this->files = [];

        $this->setActiveChat($activeRequest->id);
    }

    public function clearFile()
    {
        $this->reset('files');
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function getRequestsMessages(): Enumerable
    {
        if ($this->activeRequest) {
            return RequestMessageData::collection(
                RequestMessage::whereRequestId($this->activeRequest->id)->get()
            )->toCollection();
        }
        return collect([]);
    }

    public function mount() {
//        $this->setActiveChat();
    }


    public function render(): View
    {

        $payloads = [
            'requests'      => $this->getRequests(),
            'activeRequest' => $this->activeRequest,
            'messages'      => $this->getRequestsMessages()->where('message','!=', self::FINISHED),
            'finished'      => $this->getRequestsMessages()->where('message','==', self::FINISHED)->count() > 0

        ];

        return !empty($this->search) || $payloads['requests']->count()
            ? view('my::livewire.requests', $payloads)
            : view('my::livewire.requests-empty');
    }
}
