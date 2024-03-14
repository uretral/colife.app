<?php

namespace Modules\My\Repositories\FakeApi;

use Carbon\Carbon;
use Illuminate\Support\Enumerable;

use Modules\My\Data\Estate\EstateData;
use Modules\My\Entities\XCookie;
use Spatie\LaravelData\DataCollection;

class PaymentsListApiGenerator
{
    private array $result = [];
    protected string $rowName = 'myPayment';
    protected string $estatesRowName = 'estates';

    public function handle()
    {
        $estates = EstateData::collection(
            XCookie::where('name', $this->estatesRowName)->first()->getAttribute('json')
        )->toCollection();


        if (request()->exists('g') && request('g') > 0 || !XCookie::where('name', $this->rowName)->first()) {
            $this->payment($estates);
            XCookie::updateOrCreate(['name' => $this->rowName], ['json' => $this->result]);
        }
        return XCookie::where('name', $this->rowName)->first()->getAttribute('json');
    }

    private function payment(Enumerable $estates): void
    {
        $document = [null, 'Modules/Layout/Resources/my/assets/img/pic/bill.pdf'];
        $hint = [null,'Текст подсказки'];

        $estates->each(function (EstateData $estate) use ($document, $hint) {
            for ($item = 1; $item <= rand(10, 20); $item++) {
                $this->result[] = [
                    'id' => uniqid(),
                    'estate_id' => $estate->id,
                    'estate_address' => $estate->address,
                    'amount' => rand(10, 70) * 1000,
                    'date' => Carbon::now()->subDays(rand(1, 55))->format('d.m.y'),
                    'payment_purpose' => rand(1,3), // 1 = аренда, 2 = Ком. услуги, 3 = Доп. услуги
                    'payment_type' => rand(1,2), // 1 = наличные, 2 = банк
                    'hint' => $hint[rand(0,1)],
                    'document' => $document[rand(0, 1)],
                ];
            }
        });

    }
}
