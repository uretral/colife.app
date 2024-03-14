<?php

namespace Modules\Lk\Console;

use Illuminate\Console\Command;
use Modules\Lk\Entities\Content;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Db extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'lk:db';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->contents();
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

    protected function contents() {
        Content::all()->each(function (Content $content) {
            $content->model = str_replace('Tenant','Lk', $content->model);
            dump($content->model);
            $content->save() ? dump('ok') : dump('fail');
        });
    }
}
