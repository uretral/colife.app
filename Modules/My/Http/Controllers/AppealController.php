<?php

namespace Modules\My\Http\Controllers;

use Modules\My\Data\Appeal\AppealBitrixData;
use Modules\My\Data\Appeal\AppealData;
use Modules\My\Data\Appeal\AppealMessageData;
use Modules\My\Data\Appeal\AppealUserData;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\AppealFile;
use Modules\My\Entities\AppealMessage;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Chats\BitrixSendMessageData;

class AppealController
{

    public function createAppeal(AppealData $appealData, int $author_id): Appeal
    {
        try {
            $appeal = Appeal::create(
                $appealData->only('type_id', 'theme_id', 'status_id', 'bx_chat_uid')->toArray()
            );

            // Формируем ID чата для Битрикс
            $this->createAppealChatId($appeal);

            return $this->createAppealUser($appeal, $author_id);
        } catch (\Exception $e){
            dd($e->getMessage());
        }

    }

    public function createMessage(AppealMessageData $appealMessageData): AppealMessage
    {
        $files = $appealMessageData->files;
        $message = AppealMessage::create(
            $appealMessageData->only(
                'appeal_id',
                'author_id',
                'message',
                'read'
            )->toArray()
        );
        $this->saveFile($files, AppealMessageData::from($message));
        return $message;
    }


    public function saveFile($files, AppealMessageData $appealMessageData): void
    {
        foreach ($files as $file) {
            AppealFile::create(
                [
                    'appeal_id'  => $appealMessageData->appeal_id,
                    'message_id' => $appealMessageData->id,
                    'path'       => $file->store("public/appeals/$appealMessageData->author_id"),
                    'filename'   => $file->getClientOriginalName(),
                ]
            );
        }
    }

    public function createAppealUser(Appeal $appeal, int $author_id): Appeal
    {
        $user = AppealUserData::from(
            [
                'appeal_id'  => $appeal->id,
                'user_id'    => $author_id,
                'created_at' => now()
            ]
        );
        $appeal->appealUsers()->create($user->toArray());
        return $appeal;
    }

    public function createAppealChatId(Appeal $appeal): Appeal
    {
        $dto = AppealBitrixData::from(
            [
                'appeal_id'  => $appeal->id,
                'created_at' => now()
            ]
        );
        $appeal->bitrix()->create($dto->toArray());
        return $appeal;
    }


    public static function sendMessage(BitrixSendMessageData $dto): int
    {
        try {
            $chat = app(BitrixChatService::class);
            $response = $chat->sendMessages($dto->toArray());

            if ($response['result']['SUCCESS'] == true){
                return (int) $response['result']['DATA']['RESULT'][0]['user'];
            }

            throw new \Exception("Ошибка отправки сообщения " . json_encode($response));


        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

    }


}
