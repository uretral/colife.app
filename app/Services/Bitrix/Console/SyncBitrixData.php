<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;


class SyncBitrixData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:sync
    {--type : Обновить Смарт-Процессы-CrmTypes }
    {--fields : Обновить Поля CrmTypes}
    {--items : Обновить записи}
    {--status : Обновить Справочники CrmTypes}
    {--cfields : Обновить ContactFields}
    {--dfields : Обновить CrmDealFields}
    {--ufields : Обновить UserFields}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление данных из Битрикс24';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        // Обновляем список Смарт-процессов
        if ($this->option("type")) {
            BitrixService::updateCrmTypeList();
        }

        // Обновляем Все поля по Смарт-процессам
        if ($this->option("fields")) {
            BitrixService::updateSmartProcessesWithFields();
        }

        // Получаем записи для Смарт-процессов
        if ($this->option("items")) {
            BitrixService::updateAllItems();
        }

        // Обновляем Все справочники Смарт-процессов
        if ($this->option("status")) {
            BitrixService::updateCrmStatus();
        }

        // Обновляем Fields Контактов
        if ($this->option("cfields")) {
            BitrixService::updateCrmContactFields();
        }

        // Обновляем UserFields для всех сущностей
        if ($this->option("ufields")) {
            BitrixService::updateUserFields();
            BitrixService::updateUserFieldValues();
        }

        // Обновляем CrmDeal Fields / Crm Сделки
        if ($this->option("dfields")) {
            BitrixService::updateDealFields();
        }

        $this->info('Bitrix: обновление завершено');

        return Command::SUCCESS;
    }
}
