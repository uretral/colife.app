<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\Jobs\ProcessBitrixEvents;
use Illuminate\Console\Command;


class EventsBitrix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обработка Событий из Б24 через очередь';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        try {
            ProcessBitrixEvents::dispatch();
            return Command::SUCCESS;
        } catch (\Exception $e){
            $this->error('fail');
        }


    }
}
