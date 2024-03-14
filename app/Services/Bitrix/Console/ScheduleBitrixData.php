<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\Actions\Schedule\SyncBitrixUpdatedItemAction;
use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;


class ScheduleBitrixData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:schedule
    {--items : Обновить Смарт-Процессы за последние сутки }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ежедневное Обновление данных из Битрикс24';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        // Обновление элементов по всем смарт-процессам в Битрикс
        if ($this->option("items")) {
            app(SyncBitrixUpdatedItemAction::class)->run();
        }

        $this->info('Bitrix: обновление завершено');

        return Command::SUCCESS;
    }
}
