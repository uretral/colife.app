<?php

namespace App\Services\Bitrix\Jobs;

use App\Services\Bitrix\Actions\CrmItems\UpdateBitrixItemAction;
use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\Mappers\PlanfixToBitrixApartmentData;
use App\Services\Planfix\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * ПланфиксАпартаменты -> LocalBitrix -> B24
 * Class ProcessPushPlanfixContacts
 * @package App\Services\Bitrix\Jobs
 */
class ProcessPushPlanfixApartment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected PlanfixToBitrixApartmentData $dto;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PlanfixToBitrixApartmentData $dto)
    {
        $this->dto = $dto;
    }

    /**
     * Execute the job.
     *
     * @throws \Exception
     */
    public function handle()
    {
        try {
            $model = app(UpdateBitrixItemAction::class)->run($this->dto);
            $bx_id = BitrixService::createItemFromModel($model);
            Task::whereExtId($this->dto->ext_id)->update(["bx_id" => $bx_id]);
            Log::channel('bitrix')->info("Добавлены Апартаменты: " . $bx_id);
            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            return false;
        }
    }
}
