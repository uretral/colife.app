<?php

namespace App\Services\Bitrix\Console;


use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Enum\TypeIdEnum;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Planfix\Models\Group;
use App\Services\Planfix\Models\Phone;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class LinkBitrixPlanfixIds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:linksIds {count?} {group_id?}
        {--groups : Обновить BX_ID для групп}
        {--lords : Обновить lords потеряшек}
        ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Связать данные по ID между Битриксом и Планфиксом';

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
        if ($this->option("groups")) {
            $this->info('Cвязывание groups завершено: ' . $this->updateGroupsIds());
        }

        // Связываем по телефонам в Планфикс ID потерявшихся landlord / test
        if ($this->option("lords")) {
            $this->info('Cвязывание landlord завершено: ' . $this->updateLandLordsPlanfixBxId($this->argument('count') ));
        }

        $this->info('Cвязывание ID завершено');

        return Command::SUCCESS;
    }

    protected function updateGroupsIds(): string
    {
        try {
            Group::all()->each(
                function (Group $group) {
                    $bx_id = BitrixHelper::getTypeByGroupId($group->ext_id)->value;
                    $group->update(['bx_id' => $bx_id]);
                }
            );
            return $this->message;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function updateLandLordsPlanfixBxId($limit = 10)
    {

        $group = $this->argument('group_id') ?? 11902;

        $contacts = BitrixCrmContact::where("group_id", $group);
        if (!empty($limit))
            $contacts = $contacts->take($limit);

        $contacts->get()->each(
            function (BitrixCrmContact $contact) {

                if (empty($contact->phone->first()->value))
                    return;

                $formatted_phone = preg_replace("/[^0-9]/", "", $contact->phone->first()->value);
                $partially_phone = Str::substr($formatted_phone, -8,);

                $find = Phone::with(['contact'])
                    ->where('number', 'like', "%{$partially_phone}%")
                    ->first();

                if (!empty($find) && empty($find->contact->bx_id)) {
                    $find->contact->bx_id = $contact->bx_id;
                    $find->contact->save();
                }
            }
        );
    }



}
