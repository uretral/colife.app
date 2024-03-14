<?php

namespace App\Services\Bitrix\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:migration {table} {connection?} {field_file?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Новая миграция для битрикса';

    protected string $message = 'Успешно';

    protected Filesystem $files;
    protected string     $stubs_path;
    protected mixed      $stub;

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle(Filesystem $files)
    {
        $this->files = $files;
        $this->name = $this->argument('table');
        $this->stub = $this->files->get($this->getStub());


        $dir = base_path('database' . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR);
        $filename = Carbon::now()->format("Y_m_d_his") . "_create_" . $this->name . "_table.php";

        $this->files->put($dir . $filename, $this->build());

        $this->components->info(sprintf('%s [%s] успешно создана.', 'Миграция', $this->name));
        return Command::SUCCESS;
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function build()
    {
        return $this->replaceArgs($this->stub);
    }

    protected function getArguments()
    {
        return [
            ['table', InputArgument::REQUIRED, 'The name of the table'],
        ];
    }

    protected function getStub()
    {
        $this->stubs_path = app_path(
                'Services' . DIRECTORY_SEPARATOR . 'Bitrix' . DIRECTORY_SEPARATOR . 'Stubs'
            ) . DIRECTORY_SEPARATOR;
        $stubs_file = 'migration.create.stub';
        return $this->stubs_path . $stubs_file;
    }

    protected function replaceArgs($stub)
    {
        $stub = Str::replace(['{{ table }}', '{{table}}'], $this->name, $stub);

        if ($this->argument('connection')) {
            $stub = Str::replace(['{{ connection }}', '{{connection}}'], $this->argument('connection'), $stub);
        }

        if ($fields_file = $this->argument('field_file')) {
            if(file_exists($this->stubs_path . $fields_file)) {
                $fields = $this->files->get($this->stubs_path . $fields_file);
                $stub = Str::replace(['{{ fields }}', '{{fields}}'], $fields, $stub);
            }
        }
        return $stub;
    }

}
