<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notifiable;
use Modules\CrmApi\Contracts\CrmApi;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\CrmApi\Contracts\CrmLkApi;



class test extends Command
{
    use Notifiable;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test functionality at console';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle(CrmLkApi $api)
    {

//        self::arg('test');
//        dd(app(CrmMyApi::class)->estateList(934));
    }


    private function updateDeal($dealId): ?array
    {
        $data = [
            'title'       => 'Тестовое обращение скорректированное',
            'category_id' => 38,
            'contact_id'  => 934,
            'priority'    => 'низкий',
            'stage_id'    => 'new',
            'unit_id'     => 0,
            'opportunity' => 0,
            'message'     => 'Описание проблемы достаточно длинное',
            'files'       => ['test.jpg', 'logo_2.png', 'colife.pdf']
        ];

        return BitrixService::storeBitrixDeal($dealId, $data);
    }
}
