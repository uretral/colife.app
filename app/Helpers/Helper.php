<?php


namespace App\Helpers;


use App\Models\Tilda\TildaPage;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use App\Services\Bitrix\Enum\AppealStatusEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Enums\RoleEnum;
use Modules\My\Data\Appeal\AppealMessageData;
use Modules\My\Data\Request\RequestMessageData;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\AppealFile;
use Modules\My\Entities\AppealMessage;
use Modules\My\Entities\AppealUser;
use Modules\My\Entities\Request;
use Modules\My\Entities\RequestFile;
use Modules\My\Entities\RequestMessage;
use Modules\Tenant\Entities\User;
use Modules\My\Entities\User as MyUser;


class Helper
{
    public static function filterByFileSize($path, $size = 300000): bool
    {
        try {
            $headers = get_headers($path, 1);
            $filesize = $headers['Content-Length'];

            if ($filesize <= $size) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function clearTildaImages(array $images): array
    {
        $excludedExt = ['ico', 'svg'];

        $imgs = [];
        foreach ($images as $image) {
            if (!empty($image->from)
                && !in_array(pathinfo($image->from, PATHINFO_EXTENSION), $excludedExt)) {
                $filename = pathinfo($image->from, PATHINFO_BASENAME);
                if (!Str::contains($filename, 'tilda') && self::filterByFileSize($image->from)) {
                    $imgs[] = $image->from;
                }
            }
        }

        return $imgs;
    }

    public static function loadTildaImage(TildaPage $tildaPage, $img_path): void
    {
        $tildaPage
            ->addMediaFromUrl($img_path)
            ->toMediaCollection();
    }

    /**
     * Получить ID пользователя Поддержки
     * @return int|mixed|null
     */
    public static function getSupportUserId(): mixed
    {
        return User::whereHas(
            'roles',
            fn($q) => $q->where('name', RoleEnum::SUPPORT()->value)
        )->first()->id ?? null;
    }

    public static function getClearChatText(mixed $string): ?string
    {
        return Str::of($string)->after('[/b][br]');
    }

    /**
     * Получить ID пользователя Поддержки
     * @return int|mixed|null
     */
    public static function getMySupportUserId(): mixed
    {
        return MyUser::whereHas(
                'roles',
                fn($q) => $q->where('name', RoleEnum::SUPPORT()->value)
            )->first()->id ?? null;
    }

    public static function randomColor(): string
    {
        $rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
        return "#" . $rand;
    }

    // TODO::обсудить куда вынести
    public static function addMySupportToAppeal($appeal)
    {
        try {
            if (!$support_id = self::getMySupportUserId()) {
                throw new \Exception("Ошибка определения support_id:");
            }

            AppealUser::updateOrCreate(
                [
                    'user_id'   => $support_id,
                    'appeal_id' => $appeal->id,
                ],
                [
                    'user_id'   => $support_id,
                    'appeal_id' => $appeal->id,
                ],
            );

            return $support_id;
        } catch (\Exception $e) {
            throw new \Exception("Возможно нет пользователя Поддержки в users:" . $e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function storeMyAppealMessage(BitrixEventChatMessageData $message, Appeal $appeal, $support_id): Appeal
    {
        try {
            $clearText = self::getClearChatText($message->message->text);
            $isRate = self::isRateMessage($clearText);

            $messageDto = AppealMessageData::from(
                [
                    "appeal_id"     => $appeal->id,
                    "author_id"     => $support_id,
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
                            "author_id"     => $support_id,
                            "message"       => $clearText,
                            "read"          => 0,
                            "bx_chat_id"    => $messageDto->bx_chat_id,
                            "bx_message_id" => $messageDto->bx_message_id,
                        ],
                        $messageDto->toArray()
                    );
                    $messageDto->message_id = $message->id;
                    self::saveMyAppealFile($messageDto);
                    break;
            }

            $appeal->update(["status_id" => $status, "active" => 1]);

            return $appeal;
        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения обращения из Моста: " . $e->getMessage());
        }
    }


    public static function saveMyAppealFile(AppealMessageData $appealMessageData)
    {
        try {
            if (empty($appealMessageData->files)) {
                return;
            }

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
        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения файлов от Битрикс: " . $e->getMessage());
        }
    }


    public static function isRateMessage(string $string): ?string
    {
        $substr = config('bitrix24.B24_RATE_MESSAGE');
        return Str::of($string)->contains($substr);
    }


    /**
     * @throws \Exception
     */
    public static function storeMyRequestMessage(BitrixEventChatMessageData $message, Request $request): Request
    {
        try {
            $clearText = self::getClearChatText($message->message->text);
            $isRate = self::isRateMessage($clearText);
            $support_id = Helper::getMySupportUserId();
            $messageDto = RequestMessageData::from(
                [
                    "request_id"     => $request->id,
                    "author_id"     => $support_id,
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
                    $message = RequestMessage::updateOrCreate(
                        [
                            "author_id"     => $support_id,
                            "message"       => $clearText,
                            "read"          => 0,
                            "bx_chat_id"    => $messageDto->bx_chat_id,
                            "bx_message_id" => $messageDto->bx_message_id,
                        ],
                        $messageDto->toArray()
                    );
                    $messageDto->message_id = $message->id;
                    self::saveMyRequestFile($messageDto);
                    break;
            }

            $request->update(["status_id" => $status, "active" => 1]);

            return $request;
        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения сообщения из Моста: " . $e->getMessage());
        }
    }

    public static function saveMyRequestFile(RequestMessageData $requestMessageData)
    {
        try {
            if (empty($requestMessageData->files)) {
                return;
            }

            foreach ($requestMessageData->files->toArray() as $item) {
                $fileContent = file_get_contents($item['link']);
                $filename = $item['name'];
                $path = "public/requests/$requestMessageData->author_id/" . $filename;
                Storage::put($path, $fileContent);

                RequestFile::create(
                    [
                        'request_id'  => $requestMessageData->request_id,
                        'message_id' => $requestMessageData->message_id,
                        'path'       => $path,
                        'filename'   => $filename,
                    ]
                );
            }
        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения файлов во вх.обращения от Битрикс: " . $e->getMessage());
        }
    }

}
