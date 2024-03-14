<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeSendMessage;
use Livewire\Attributes\Locked;
use Livewire\WithFileUploads;
use Modules\Lk\Data\Chat\ChatData;
use Modules\Lk\Entities\Chat as Model;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Lk\Livewire\Form\ChatCreateMessageForm;
use Modules\Lk\Livewire\Form\ChatListForm;
use Modules\Lk\Repositories\UserRepository;

class Chat extends Component
{
    use  WithFileUploads;


    public ChatListForm $chatListForm;
    public ChatCreateMessageForm $createMessageForm;

    public function mount()
    {

        $this->chatListForm->chatListInit();
    }



    public function getListeners()
    {
        $this->listeners['onMessageSubmit'] = 'onMessageSubmit';
        $this->chatListForm->chats->each(
            function (ChatData $chat) {
                $event = "echo-private:chats.{$chat->id},.chatUpdated";
                $this->listeners[$event] = 'broadcastedNotifications';
            }
        );
        return $this->listeners;
    }

    public function broadcastedNotifications($event)
    {
        $this->chatListForm->chats();
        $this->dispatch("onSwitcherUpdate");
    }


    public function setActiveChat($id)
    {
        $this->chatListForm->setActiveChat($id);
    }

    public function updateMessages(Model $chat)
    {
        $chat->messages()->update(['read' => true]);
    }


    public function onMessageSubmit($txt = false) {
      $this->createMessageForm->onMessageSubmit(
          $txt,
          $this->chatListForm->chat()->id,
          $this->userId
      );
    }

    public function clearFile() {
        $this->createMessageForm->clearFile();
    }

    public function render(): View
    {
        return view(
            'lk::livewire.chat'
        );
    }
}
