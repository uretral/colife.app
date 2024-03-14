<?php

namespace App\Console\Commands;


use App\Services\Bitrix\BitrixService;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notifiable;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Repositories\UserRepository;


class test extends Command
{
    use Notifiable;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

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
    public function handle()
    {

        dump(
            app(CrmMyApi::class)->paymentIncome(
           96,
            "ae"
        ));


    }


}
