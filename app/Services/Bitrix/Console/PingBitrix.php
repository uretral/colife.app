<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\Actions\CrmType\GetBitrixTypeListAction;
use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;


class PingBitrix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверка работоспособности Битрикс24';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        try {

            $list = app(GetBitrixTypeListAction::class)->run();

            $this->info(count($list) > 0 ? 'active' : 'fail');

            return Command::SUCCESS;
        } catch (\Exception $e){
            $this->error('fail');
        }


    }
}
