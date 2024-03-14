<?php

namespace Modules\My\Console;


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
    protected $signature = 'MyStore:locales';

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
        Locales::all()->each(function ($item) {

            if (config('app.env') == 'local') {
                $file = sprintf(config('colife.TRANSLATION_PATH_MY'), $item->code);
            } else {
                $file = sprintf($_SERVER['HOME'] . DIRECTORY_SEPARATOR . config('colife.TRANSLATION_PATH_MY'), $item->code);
            }

            $this->array = [];

            Translation::all()->each(function ($translation) use ($item) {

                foreach ($translation->translation as $lang) {
                    if (array_key_exists($item->code, $lang)) {
                        $this->array[$translation->page . '-' . $lang['key']] = $lang[$item->code];
                    }
                }
            });

            file_put_contents($file, json_encode($this->array, JSON_UNESCAPED_UNICODE));
        });
    }
}
