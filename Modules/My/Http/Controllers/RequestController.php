<?php

namespace Modules\My\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\My\Data\Request\RequestBitrixData;
use Modules\My\Data\Request\RequestData;
use Modules\My\Data\Request\RequestMessageData;
use Modules\My\Data\Request\RequestUserData;
use Modules\My\Entities\AppealFile;
use Modules\My\Entities\RequestFile;
use Modules\My\Entities\RequestMessage;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Chats\BitrixSendMessageData;
use Modules\My\Entities\Request;

class RequestController
{

    public function createRequest(RequestData $requestData, int $author_id): Request
    {
        try {
            $request = Request::create(
                $requestData->only('type_id', 'theme_id', 'status_id', 'bx_chat_uid')->toArray()
            );

            // Формируем ID чата для Битрикс
            $this->createAppealChatId($request);

            return $this->createRequestUser($request, $author_id);
        } catch (\Exception $e){
            dd($e->getMessage());
        }

    }

    public function createMessage(RequestMessageData $requestMessageData): RequestMessage
    {
        $files = $requestMessageData->files;
        $message = RequestMessage::create(
            $requestMessageData->only(
                'request_id',
                'author_id',
                'message',
                'read'
            )->toArray()
        );
        $this->saveFile($files, RequestMessageData::from($message));
        return $message;
    }


    public function saveFile($files, RequestMessageData $requestMessageData): void
    {
        if (!empty($files)) {
            foreach ($files as $file) {
                Log::info(json_encode($file));
                $path = "public/requests/$requestMessageData->author_id";

                RequestFile::create(
                    [
                        'request_id' => $requestMessageData->request_id,
                        'message_id' => $requestMessageData->id,
                        'path'       => $file->store("public/requests/$requestMessageData->author_id"),
                        'filename'   => $file->getClientOriginalName(),
                    ]
                );
            }
        }
    }

    public function createRequestUser(Request $request, int $author_id): Request
    {
        $user = RequestUserData::from(
            [
                'request_id'  => $request->id,
                'user_id'    => $author_id,
                'created_at' => now()
            ]
        );
        $request->requestUsers()->create($user->toArray());
        return $request;
    }

    public function createAppealChatId(Request $request): Request
    {
        $dto = RequestBitrixData::from(
            [
                'request_id'  => $request->id,
                'created_at' => now()
            ]
        );
        $request->bitrix()->create($dto->toArray());
        return $request;
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
