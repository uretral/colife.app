<?php

namespace App\Services\Bitrix\Jobs;

use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Events\BitrixEventsData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProcessBitrixEvents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Переработать на вебхуки/API к Мосту

//        $getEvents = BitrixChatService::getNewChatMessages();
//        $events = BitrixEventsData::collection($getEvents);
//
//        $events->each(function (BitrixEventsData $event){
//
//            switch ($event->EVENT_NAME){
//                case "ONIMCONNECTORMESSAGEADD":
//                    return ProcessBitrixChatEvents::dispatch($event->EVENT_DATA);
//                default:
//                    break;
//
//            }
//            Log::channel('bitrix')->info('Обработка events завершена');
//
//        });
    }
}
