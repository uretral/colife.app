<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;


class RegisterBitrixConnector extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:connector
    {--register : Регистрация коннектора }
    {--unregister : Удаление коннектора }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Регистрация Коннектора для Битрикс';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        try {

            if ($this->option("register")) {
                // Регистрация Коннектора
                BitrixService::installConnector();
                // Активация ОЛ линий чатов-обращений (.env)
                BitrixService::installChatLines();
                // Активация событий по сообщениям в режиме offline
                BitrixService::installChatEvents();
            }

            if ($this->option("unregister")) {
                // Удаление основного Коннектора
                $connectorId = config('bitrix24.B24_CONNECTOR_ID');
                BitrixService::uninstallConnector($connectorId);
            }

            return Command::SUCCESS;
        } catch (\Exception $e){
            $this->error('fail');
        }


    }
}
