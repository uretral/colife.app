<?php

namespace App\Services\Bitrix\Console;



use App\Services\Bitrix\Data\Mappers\PlanfixToBitrixApartmentData;
use App\Services\Bitrix\Data\Mappers\PlanfixToBitrixUnitItemData;
use App\Services\Bitrix\Jobs\ProcessPushPlanfixApartment;
use App\Services\Bitrix\Jobs\ProcessPushPlanfixContacts;
use App\Services\Bitrix\Jobs\ProcessPushPlanfixUnit;
use App\Services\Planfix\Data\TaskData;
use App\Services\Planfix\Models\Contact;
use App\Services\Planfix\Models\Task;
use Illuminate\Console\Command;


class PushPlanfix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:push {num?} {group?}
                {--contacts : контакты из Planfix}
                {--ext : id}
                {--apartments : Квартиры из Planfix}
                {--units : Квартиры из Planfix}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка данных из Planfix';

    protected string $message = 'Успешно';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        // Проставляем в Планфикс Groups соответствия BX_ID
        if ($this->option("contacts")) {
            $this->info('Отправлено контактов: ' . $this->pushContacts($this->argument('num')));
        }

        // Проставляем 1 Контакт По EXT_ID
        if ($this->option("ext")) {
            $this->info('Отправлен по EXT_ID: ' . $this->pushContactByExtId($this->argument('num')));
        }

        // Отправляем Квартиры
        if ($this->option("apartments")) {
            $this->info("Апартаменты отправлены: " . $this->pushApartment());
        }

        // Отправляем Квартиры
        if ($this->option("units")) {
            $this->info("Комнаты отправлены: " . $this->pushUnits());
        }

        $this->info('Отправка поставлена в очередь');

        return Command::SUCCESS;
    }

    protected function pushContacts($count = 2): string
    {
        try {
            $group_id = $this->argument('group') ?? 11904;
            Contact::whereNotNull('group_id')
                ->whereGroupId($group_id)
                ->whereNull('bx_id')
                ->offset(0)
                ->take($count)
                ->get()
                ->each(
                    function (Contact $c) {
                        ProcessPushPlanfixContacts::dispatch($c);
                    }
                );

            return "$this->message записей: $count ";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    protected function pushContactByExtId($ext_id = null): string
    {
        try {
            Contact::whereExtId($ext_id)
                ->get()
                ->each(
                    function (Contact $c) {
                        ProcessPushPlanfixContacts::dispatch($c);
                    }
                );

            return "$this->message EXT_ID: $ext_id ";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    protected function pushApartment(): string|bool
    {
        try {
            $templateId = 52; // Шаблон квартира
            $amount = !empty($this->argument('num')) // Кол-во
                ? $this->argument('num')
                : 1;

            $apartments = Task::whereTemplateId($templateId)
                ->whereNull("bx_id")
                ->take($amount)
                ->get();

            $items = collect([]);
            foreach ($apartments as $apartment) {
                $apartment = TaskData::from($apartment->toArray());
                $items->push(PlanfixToBitrixApartmentData::from($apartment->toArray()));
            }

            $items->each(
                function (PlanfixToBitrixApartmentData $item) {
                    ProcessPushPlanfixApartment::dispatch($item);
                    $this->info("Апартаменты EXT_ID: {$item->ext_id}");
                }
            );

            return $this->message;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    protected function pushUnits(): string|bool
    {
        try {
            $templateId = 53; // Шаблон квартира
            $amount = !empty($this->argument('num')) // Кол-во
                ? $this->argument('num')
                : 1;

            $apartments = Task::whereTemplateId($templateId)
                ->whereNull("bx_id")
                ->take($amount)
                ->get();

            $items = collect([]);
            foreach ($apartments as $apartment) {
                $apartment = TaskData::from($apartment->toArray());
                $items->push(PlanfixToBitrixUnitItemData::from($apartment->toArray()));
            }

            $items->each(
                function (PlanfixToBitrixUnitItemData $item) {
                    ProcessPushPlanfixUnit::dispatch($item);
                    $this->info("Комната EXT_ID: {$item->ext_id}");
                }
            );

            return $this->message;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
