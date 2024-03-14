<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class ThinkMeCommand extends Command
{
    protected $signature = 'think';

    protected $description = 'Command description';

    public function handle(): void
    {
        $filterDates = '01.08.23 — 08.08.23';
        $split = preg_split("/(—|-)/", $filterDates);

        echo Carbon::createFromFormat('d.m.y','05.08.23')->between( Carbon::createFromFormat('d.m.y',trim($split[0]) ) ,  Carbon::createFromFormat('d.m.y',trim($split[1]) )) ? 'yyyyy' .PHP_EOL :  'nnnn' .PHP_EOL;

    }
}
