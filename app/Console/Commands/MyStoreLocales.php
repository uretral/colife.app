<?php

namespace App\Console\Commands;


use Modules\Admin\Entities\Locales;
use Illuminate\Console\Command;
use Modules\My\Entities\Translation;


class MyStoreLocales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MyStore:myLocales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запись и сохранение lang файлов';

    /**
     * Execute the console command.
     *
     * @return int
     */


    protected array $array;

    public function handle()
    {
        Locales::all()->each(function ($item){
            $file = base_path("Modules/My/Resources/lang/$item->code.json");
            $this->array = [];

            Translation::all()->each(function ($translation) use ($item){


                foreach ($translation->translation as $lang) {
                    if(array_key_exists($item->code, $lang)) {
                        $this->array[$translation->page.'-'.$lang['key']] = $lang[$item->code];
                    }
                }
            });

            file_put_contents($file, json_encode($this->array,JSON_UNESCAPED_UNICODE));
        });
    }
}
