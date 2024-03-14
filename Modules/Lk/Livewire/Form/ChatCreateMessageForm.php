<?php

namespace Modules\Lk\Livewire\Form;

use Illuminate\Validation\Validator;
use Modules\Lk\Data\Chat\ChatMessageData;
use Modules\Lk\Events\TenantChatMessageCreatedEvent;
use Modules\Lk\Http\Controllers\ChatController;
use Modules\Lk\Jobs\Amplitude\AmplitudeSendMessageJob;

class ChatCreateMessageForm extends \Livewire\Form
{
    public mixed $tt = null;
    public mixed $ttt = null;
    public mixed $tttt = null;

    /*---------*/

    public $files = [];
    public string $txt = '';

    protected $rules = [
        'txt' => 'required|min:2',
        'files.*' => 'max:100000',
    ];

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

    public function clearFile()
    {
        $this->reset('files');
    }


    public function onMessageSubmit($txt, $chatId, $userId)
    {

//        $this->tt = $txt;
//        $this->ttt = $chatId;
//        $this->tttt = $userId;
//        return false;


        $this->txt = (string)preg_replace('~^\s+|\s+$~u', '', strip_tags(html_entity_decode($txt, ENT_QUOTES, 'UTF-8')));

        $message = app(ChatController::class)->createMessage(
            ChatMessageData::from(
                [
                    'chat_id' => $chatId,
                    'user_id' => $userId,
                    'message' => !empty($this->txt) ? $this->txt : 'Нет описания файла',
                    'read' => 1,
                    'files' => $this->files
                ]
            )
        );

        // Отправка события
        TenantChatMessageCreatedEvent::dispatch($chatId, $message);

        /* Событие Amplitude - Отправка обращения */
        AmplitudeSendMessageJob::dispatch([
            'chat_id' => $message->chat_id,
            'text' => $message->message
        ]);

        $this->reset('files', 'txt');
    }

}
