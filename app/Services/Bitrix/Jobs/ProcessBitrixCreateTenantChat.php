<?php

namespace App\Services\Bitrix\Jobs;

use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Apartment\BitrixApartmentChatUserData;
use App\Services\Bitrix\Data\Events\BitrixEventsData;
use App\Services\Bitrix\Helpers\BitrixHelper;
use Modules\Tenant\Services\TenantService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessBitrixCreateTenantChat implements ShouldQueue
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

            $bx_chat_user_id = BitrixChatService::createTenantChat($this->bxContactId);
            Log::channel('tenant')->info("CreateTenantChat: chatUserId " . $bx_chat_user_id);

            TenantService::createPersonalChat($this->bxContactId,$bx_chat_user_id);
            //ProcessBitrixCreateGroupChat::dispatch($this->bxContactId);

        } catch (\Exception $e) {
            Log::channel('tenant')->info(
                'Ошибка создания чатов жильца, id контакта: '
                . $this->bxContactId . PHP_EOL
                . $e->getMessage()
            );
        }
    }
}
