<?php

namespace Modules\My\Http\Controllers;

use Modules\My\Data\Chat\ChatMessageData;
use Modules\My\Entities\ChatFile;
use Modules\My\Entities\ChatMessage;

class ChatController
{

    public function createMessage(ChatMessageData $chatMessageData): ChatMessage
    {
        $files = $chatMessageData->files;
        $message = ChatMessage::create(
            $chatMessageData->only(
                'chat_id',
                'user_id',
                'message',
                'read'
            )->toArray()
        );
        $this->saveFile($files, ChatMessageData::from($message));
        return $message;
    }


    public function saveFile($files, ChatMessageData $chatMessageData): void
    {
        foreach ($files as $file) {
            ChatFile::create(
                [
                    'chat_id'    => $chatMessageData->chat_id,
                    'message_id' => $chatMessageData->id,
                    'path'       => $file->store("public/chats/$chatMessageData->id"),
                    'filename'   => $file->getClientOriginalName(),
                ]
            );
        }
    }

}
