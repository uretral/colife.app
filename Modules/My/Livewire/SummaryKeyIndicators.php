<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Estate\EstateData;
use Modules\My\Data\Estate\EstateRoomData;
use Modules\My\Data\Estate\EstateUnitData;
use Modules\My\Data\Payment\PaymentFinancialData;
use Modules\My\Repositories\UserRepository;

class SummaryKeyIndicators extends Component
{
    public Enumerable $apartments;

    public int $apartmentsCount = 0;
    public int $apartmentsBusy = 0;
    public int $apartmentsEmpty = 0;
    public int $apartmentsPartly = 0;

    public int $roomsCount = 0;
    public int $roomsBusy = 0;
    public int $roomsEmpty = 0;
    public int $roomsPartly = 0;

    public int $unitsCount = 0;
    public int $unitsBusy = 0;
    public int $unitsEmpty = 0;

    public int $busynessPercent = 0;
    public int $totalIncome = 0;


    public function getApartments(): void
    {
        $this->apartments = EstateData::collection(
            app(CrmMyApi::class)
                ->estateList(UserRepository::getAuthUser()->bx_id, UserRepository::getAuthUserCountryCode())
        )->toCollection();
    }


    public function getIndicators()
    {
        $this->getApartments();
        $this->initUnits();

        /*APARTMENTS*/
        $this->apartments->map(function (EstateData $estateData) {

            /*ROOMS*/
            $estateData->rooms->map(function (EstateRoomData $roomData) {
                $this->rooms($roomData);
                return $roomData;
            });

            $roomsCnt = $estateData->rooms->count();

            /*Расчет занятости одной квартиры в %*/
            $estateData->busyness = $estateData->rooms->toCollection()->pipe(function ($collection) use ($roomsCnt) {
                return $collection->sum('busyness') / $roomsCnt;
            });

            /*Расчет занятости комнат в одной квартире */
            $estateData->roomsBusy = $estateData->rooms->where('busyness', '=', 100)->count();
            $estateData->roomsEmpty = $estateData->rooms->where('busyness', '=', 0)->count();
            $estateData->roomsPartly = $estateData->rooms->where('busyness', '<', 100)->where('busyness', '>', 0)->count();

            return $estateData;
        });

        $this->aps();
    }

    public function initUnits()
    {
        $this->unitsCount = 0;
        $this->unitsBusy = 0;
        $this->unitsEmpty = 0;
    }

    public function aps()
    {
        /*Кол-во всех квартир*/
        $this->apartmentsCount = $this->apartments->count();
        $apsCount = $this->apartmentsCount;
        /*Кол-во занятых квартир*/
        $this->apartmentsBusy = $this->apartments->where('busyness', '=', 100)->count();
        /*Кол-во НE занятых квартир*/
        $this->apartmentsEmpty = $this->apartments->where('busyness', '=', 0)->count();
        /*Кол-во ЧАСТИЧНО занятых квартир*/
        $this->apartmentsPartly = $this->apartments->where('busyness', '<', 100)->where('busyness', '>', 0)->count();

        /*Расчет занятости всех квартир в %*/
        $this->busynessPercent = $this->apartments->pipe(function ($collection) use ($apsCount) {
            return $apsCount ? $collection->sum('busyness') / $apsCount : 0;
        });

        session()->put('apartmentsCount', $this->apartmentsCount);
        session()->put('apartmentsBusy', $this->apartmentsBusy);
        session()->put('apartmentsEmpty', $this->apartmentsEmpty);
        session()->put('apartmentsPartly', $this->apartmentsPartly);
        session()->put('busynessPercent', $this->busynessPercent);
    }

    public function rooms(EstateRoomData $roomData)
    {
        $roomData->busyUnits = $roomData->units->where('tenant', '!=', null)->count();
        $roomData->emptyUnits = $roomData->units->where('tenant', '=', null)->count();
        $roomData->busyness = ($roomData->busyUnits / ($roomData->busyUnits + $roomData->emptyUnits)) * 100;

        $this->units($roomData->busyUnits, $roomData->emptyUnits);

        /*UNITS*/
        $roomData->units->map(function (EstateUnitData $unitData) {
            $this->unitsCount++;
            $unitData->tenant ? $this->unitsBusy++ : $this->unitsEmpty++;

            return $unitData;
        });
    }

    public function units($busy, $empty)
    {
        $this->unitsCount = $this->unitsCount + $busy + $empty;
        $this->unitsBusy = $this->unitsBusy + $busy;
        $this->unitsEmpty = $this->unitsEmpty + $empty;
    }

    #[On('onGetFinancials')]
    public function getTotalIncome($payload)
    {
        $this->totalIncome = 0;
        foreach (PaymentFinancialData::collection($payload) as $financialData) {
//            if ($financialData->type == 'Receive')
//                $this->totalIncome = $this->totalIncome - (int)$financialData?->amount?->value ?? 0;

            if ($financialData->type == 'Expenses')
                $this->totalIncome = $this->totalIncome + (int)$financialData?->amount?->value ?? 0;
        }

        session()->put('totalIncome', $this->totalIncome);
    }

    public function mount()
    {
        $this->getIndicators();
    }

    public function render(): View
    {
        return view('my::livewire.summary-key-indicators');
    }
}
