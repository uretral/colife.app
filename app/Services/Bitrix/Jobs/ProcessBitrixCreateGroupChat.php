<?php

namespace App\Services\Bitrix\Jobs;

use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Apartment\BitrixApartmentChatUserData;
use App\Services\Bitrix\Data\Events\BitrixEventsData;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixApartmentChat;
use App\Services\Bitrix\Models\BitrixTenantChat;
use App\Services\TenantAccount\TenantService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessBitrixCreateGroupChat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $bxContactId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $bxContactId)
    {
        $this->bxContactId = $bxContactId;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        try {

            // Находим Апартаменты по BX_ID контакта
            if (!$apartment = BitrixHelper::getApartmentByContactId($this->bxContactId)){
                throw new \Exception("Квартира не найдена для {$this->bxContactId}");
            }

            // Создаем квартирный чат или берем существующий
            $apartmentChat = BitrixChatService::createGroupChat($apartment);

            // Находим Bitrix ID пользователя для чатов через персональный чат
            $chatUserId = BitrixTenantChat::whereBxUserId($this->bxContactId)->first()?->bx_chat_user_id;

            // Добавляем пользователя в локальный квартирный чат
            $apartmentChat->users()->updateOrCreate(
                [
                    "bx_user_id"      => $chatUserId,
                    "bx_apartment_id" => $apartment->apartmentId
                ],
                [
                    "bx_user_id"      => $chatUserId,
                    "bx_apartment_id" => $apartment->apartmentId
                ],
            );

            // Создаем локальный квартирный чат
            TenantService::createGroupChat($apartmentChat->bx_chat_uid, $this->bxContactId,$apartment->apartmentId);

            BitrixChatService::addUsersToGroupChat($apartmentChat);

        } catch (\Exception $e) {
            Log::channel('bitrix')->info(
                'Ошибка создания группового чата, id контакта: '
                . $this->bxContactId . PHP_EOL
                . $e->getMessage()
            );
        }
    }
}
