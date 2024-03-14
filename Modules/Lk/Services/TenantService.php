<?php


namespace Modules\Lk\Services;


use App\Helpers\Helper;
use App\Services\Bitrix\Models\BitrixApartmentChat;
use App\Services\Bitrix\Models\BitrixTenantChat;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Data\Chat\BridgeTenantChatData;
use Modules\Lk\Entities\User;
use Modules\Lk\Data\Chat\ChatData;
use Modules\Lk\Data\Chat\ChatUserData;
use Modules\Lk\Entities\AppealUser;
use Modules\Lk\Entities\Chat;
use Modules\Lk\Entities\ChatBitrix;
use Modules\Lk\Entities\ChatUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Lk\Helpers\TenantHelper;

class TenantService
{

    public static function getUserForChat()
    {
        if (app()->runningInConsole()) {
            $user = User::first();
        } else {
            $user = auth()->guard('lk')->user();
        }
        return $user;
    }

    /**
     * @throws \Exception
     */
    public static function createPersonalChat(int $bxContactId, BridgeTenantChatData $chatData): Chat|Model|int
    {
        $user = User::whereBxId($bxContactId)->firstOrFail();
        $user->chatAttributes->bx_chat_user_id = $chatData->bx_chat_user_id;
        $user->chatAttributes->save();

        if (!$chat = Chat::chatExists($user->id, 0)) {
            $chat = self::createChat($user);
            Log::channel('tenant')->info("CreatedLocalChat id:  " . $chat->id);
        }

        TenantService::addUsersToChat($chat, $user->id);
        TenantService::addBitrixData($chat, $chatData);
        return $chat;
    }

    public static function createChat(User $user): Chat|Model
    {
        return Chat::create(
            ChatData::from(
                [
                    "title"      => config('tenant.TENANT_PERSONAL_CHAT_TITLE'),
                    "icon"       => "resources/img/icons/chat-user.svg",
                    "is_group"   => false,
                    "users"      => [ChatUserData::from($user)],
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            )->toArray()
        );
    }

    public static function createGroupChat(string $chatUid, int $bxContactId, $apartmentId): Chat|Model|int
    {
        try {
            $user = User::whereBxId($bxContactId)->firstOrFail();

            if (!$chat = Chat::getByBitrixChatId($chatUid)->first()) {
                $chat = Chat::create(
                    ChatData::from(
                        [
                            "title"      => config('tenant.TENANT_GROUP_CHAT_TITLE'),
                            "icon"       => "resources/img/icons/chat-users.svg",
                            "is_group"   => 1,
                            "users"      => [ChatUserData::from($user)],
                            "created_at" => now(),
                            "updated_at" => now(),
                        ]
                    )->toArray()
                );
            }

            self::addUsersToChat($chat, $user->id);
            TenantService::addGroupChatBitrixData($chat, $apartmentId);
            return $chat;
        } catch (\Exception $e) {
            throw new \Exception(self::class . " createGroupChat " . $e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function addUsersToChat(Chat $chat, $user_id): bool
    {
        try {
            $chatUser = ChatUser::updateOrCreate(
                [
                    "chat_id" => $chat->id,
                    "user_id" => $user_id
                ]
            );
            Log::channel('tenant')->info("Added ChatUser id:  " . $chatUser->id);

            self::addSupportToChat($chat->id, type: "chat");
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Ошибка добавления пользователей в чат жильца:" . $e->getMessage());
        }
    }

    public static function addBitrixData(Chat $chat, BridgeTenantChatData $bitrixChat): Model
    {
        try {

            return ChatBitrix::updateOrCreate(
                [
                    "chat_id" => $chat->id,
                ],
                [
                    'chat_id'     => $chat->id,
                    'bx_user_id'  => $bitrixChat->bx_chat_user_id,
                    'bx_chat_id'  => $bitrixChat->bx_chat_id,
                    'bx_chat_uid' => $bitrixChat->bx_chat_uid,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Ошибка addBitrixData для чата: ".$chat->id . $e->getMessage());
        }
    }

    public static function addSupportToChat($chat_id, $type = "appeal"): ChatUser|AppealUser
    {
        try {
            $support_id = TenantHelper::getSupportUserId();

            switch ($type) {
                case "chat":
                    $model = new ChatUser();
                    $id = "chat_id";
                    break;
                default:
                    $model = new AppealUser();
                    $id = "appeal_id";
                    break;
            }

            $data = [
                'user_id' => $support_id,
                $id       => $chat_id,
            ];

            $model::updateOrCreate($data,$data);

            Log::channel('tenant')->info("Support added to chat id: " . $chat_id);

            return $model;
        } catch (\Exception $e) {
            throw new \Exception("Возможно нет пользователя Поддержки в users:" . $e->getMessage());
        }
    }

    public static function getUserGroupChatId(int $userId): int
    {
        // Заменить на реализацию
        return 11172;
    }

    public static function addGroupChatBitrixData(Chat $chat, $apartmentId): Model
    {
        try {
            if (!$bxContactId = $chat->users()->first()->bx_id) {
                throw new \Exception("Ошибка addBitrixData, пользователь не найден");
            }

            $bitrixChat = BitrixApartmentChat::whereBxApartmentId($apartmentId)->first();

            if (!$bitrixChat) {
                throw new \Exception("Отсутствует чат bitrix=апартаменты: id контакта" . $bxContactId);
            }

            return ChatBitrix::updateOrCreate(
                [
                    "chat_id" => $chat->id,
                ],
                [
                    'chat_id'     => $chat->id,
                    'bx_user_id'  => $bxContactId,
                    'bx_chat_id'  => $bitrixChat->bx_chat_id,
                    'bx_chat_uid' => $bitrixChat->bx_chat_uid,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Ошибка создания элемента group_chat_bitrix: " . $e->getMessage());
        }
    }


    public static function url_exists($url): bool
    {
        if(str_contains($url, config('app.url'))) {
            $url = str_replace(config('app.url'),'', $url);
        }
        return file_exists( public_path($url));
    }


}
