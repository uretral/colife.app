<?php

namespace App\Services\Bitrix\Jobs;

use Illuminate\Support\Facades\Storage;
use Modules\Tenant\Entities\AppealFile;
use Modules\Tenant\Entities\User;
use Modules\Tenant\Events\AppealUpdatedEvent;
use Modules\Tenant\Events\ChatUpdatedEvent;
use App\Helpers\Helper;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use App\Services\Bitrix\Data\Events\BitrixEventsData;
use App\Services\Bitrix\Data\Events\BitrixEventsDataDto;
use App\Services\Bitrix\Enum\AppealStatusEnum;
use App\Services\Bitrix\Helpers\BitrixHelper;
use Modules\Tenant\Data\Appeal\AppealMessageData;
use Modules\Tenant\Data\Chat\ChatMessageData;
use Modules\Tenant\Entities\Appeal;
use Modules\Tenant\Entities\AppealMessage;
use Modules\Tenant\Entities\AppealUser;
use Modules\Tenant\Entities\Chat;
use Modules\Tenant\Entities\ChatMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Tenant\Events\TenantNotificationEvent;
use Modules\Tenant\Helpers\TenantHelper;

class ProcessBitrixChatEvents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private BitrixEventsDataDto $data;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private mixed $connector;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private mixed $appealLine;
    /**
     * @var int|mixed|null
     */
    private int   $support_id;
    private array $chatLines;
    private int   $groupLine;
    private int   $personalLine;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BitrixEventsDataDto $data)
    {
        $this->data = $data;
        $this->connector = config('bitrix24.B24_CONNECTOR_ID');
        $this->appealLine = (int) config('bitrix24.B24_LINE_APPEALS_ID');
        $this->groupLine =  (int) config('bitrix24.B24_LINE_GROUP_CHAT_ID');
        $this->personalLine =  (int) config('bitrix24.B24_LINE_CHAT_ID');

        $this->chatLines = [$this->appealLine, $this->groupLine, $this->personalLine];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {

            if ($this->data->CONNECTOR != $this->connector
                || !in_array($this->data->LINE, $this->chatLines)) {
                Log::channel('bitrix')->info('Событие не подходит для обработки чата');
                return;
            }

            Log::channel('bitrix')->info(json_encode($this->data));

            $this->data->MESSAGES->each(
                function (BitrixEventChatMessageData $message) {

                    // Вынести и раскидать все красиво после работоспособности
                    switch ($this->data->LINE) {
                        case $this->appealLine: // Обращения
                            $appeal = Appeal::getByBitrixChatId($message->chat->id)->firstOrFail();
                            $this->addSupportToChat($appeal)->storeMessage($message, $appeal);
                            if (BitrixChatService::setDeliveredStatus($message, $appeal->id, $message->chat->id)) {
                                $appeal->delivered_at = now();
                            }

                            // События
                            event(new AppealUpdatedEvent($appeal->id));
                            $appeal->users()->each(fn(User $user) => event(new TenantNotificationEvent($user->id)));
                            break;

                        default: // чаты
                            $chat = Chat::getByBitrixChatId($message->chat->id)->firstOrFail();
                            $this->storeChatMessage($message, $chat);
                            if (BitrixChatService::setDeliveredStatus($message, $chat->id, $message->chat->id)) {
                                $chat->delivered_at = now();
                            }

                            // События
                            event(new ChatUpdatedEvent($chat));
                            $chat->users()->each(fn(User $user) => event(new TenantNotificationEvent($user->id)));
                            break;
                    }

                    return true;
                }
            );
        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения события чата: " . $e->getMessage());
        }
    }

    private function addSupportToChat($appeal): static
    {
        try {
            if (!$this->support_id = TenantHelper::getSupportUserId()) {
                throw new \Exception("Ошибка определения support_id:");
            }

            AppealUser::updateOrCreate(
                [
                    'user_id'   => $this->support_id,
                    'appeal_id' => $appeal->id,
                ],
                [
                    'user_id'   => $this->support_id,
                    'appeal_id' => $appeal->id,
                ],
            );

            return $this;
        } catch (\Exception $e) {
            throw new \Exception("Возможно нет пользователя Поддержки в users:" . $e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    private function storeMessage(BitrixEventChatMessageData $message, Appeal $appeal): Appeal
    {
        $clearText = BitrixHelper::getClearChatText($message->message->text);
        $isRate = BitrixHelper::isRateMessage($clearText);

        $messageDto = AppealMessageData::from(
            [
                "appeal_id"     => $appeal->id,
                "author_id"     => $this->support_id,
                "message"       => $clearText ?? $message->message->text,
                "bx_chat_id"    => $message->im->chat_id,
                "bx_message_id" => $message->im->message_id,
                "files"         => $message->message->files,
                "read"          => 0,
                "created_at"    => now()
            ]
        );

        switch ($isRate) {
            case true:
                $status = AppealStatusEnum::CLOSED()->value;
                break;
            default:
                $status = AppealStatusEnum::PROCESS()->value;
                $message = AppealMessage::updateOrCreate(
                    [
                        "author_id"     => $this->support_id,
                        "message"       => $clearText,
                        "read"          => 0,
                        "bx_chat_id"    => $messageDto->bx_chat_id,
                        "bx_message_id" => $messageDto->bx_message_id,
                    ],
                    $messageDto->toArray()
                );
                $messageDto->message_id = $message->id;
                $this->saveFile($messageDto);
                break;
        }

        $appeal->update(["status_id" => $status, "active" => 1]);

        return $appeal;
    }

    /**
     * @param BitrixEventChatMessageData $message
     * @param Chat $chat
     * @return Chat
     */
    private function storeChatMessage(BitrixEventChatMessageData $message, Chat $chat): Chat
    {
        $clearText = BitrixHelper::getClearChatText($message->message->text);

        $messageDto = ChatMessageData::from(
            [
                "chat_id"    => $chat->id,
                "user_id"    => Helper::getSupportUserId(),
                "message"    => $clearText ?? $message->message->text,
                "read"       => 0,
                "created_at" => now()
            ]
        );
        ChatMessage::create($messageDto->toArray());

        return $chat;
    }

    private function saveFile(AppealMessageData $appealMessageData)
    {

        try {

            if (empty($appealMessageData->files))
                return;

            foreach ($appealMessageData->files->toArray() as $item) {
                $fileContent = file_get_contents($item['link']);
                $filename = $item['name'];
                $path = "public/appeals/$appealMessageData->author_id/" . $filename;
                Storage::put($path, $fileContent);

                AppealFile::create(
                    [
                        'appeal_id'  => $appealMessageData->appeal_id,
                        'message_id' => $appealMessageData->message_id,
                        'path'       => $path,
                        'filename'   => $filename,
                    ]
                );
            }
        } catch (\Exception $e){
            throw new \Exception("Ошибка сохранения файлов от Битрикс: " . $e->getMessage());
        }

    }
}
