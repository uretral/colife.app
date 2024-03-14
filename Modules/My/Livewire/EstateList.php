<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Estate\EstateData;
use Modules\My\Entities\User;
use Modules\My\Helpers\PluralsService;
use Modules\My\Repositories\FakeApi\ApiGenerator;
use Modules\My\Repositories\FakeApi\EstatesListApiGenerator;
use Modules\My\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class EstateList extends Component
{

    public $estates;
    public string $currentEstate = '';


    public function goToPaymentRent($id)
    {
        return redirect()->to('/payments-rent/' . $id);
    }

    public function openGallery($id)
    {
        $this->dispatch("onOpenGallery$id", open: true);
    }

    public function onOpenDocs()
    {
        $this->dispatch('onOpenDocs', open: true);
    }

    public function unitsCalc(EstateData $estate): array
    {
        $cnt = 0;
        $arrState = [];
        foreach ($estate->rooms as $room) {
            $cnt = $cnt + count($room->units);
            foreach ($room->units as $unit) {
                $arrState[] = !is_null($unit->tenant);
            }
        }
        return ['cnt' => $cnt, 'arrState' => $arrState];
    }

    public function countUnits(EstateData $estate): string
    {
        $unitProps = $this->unitsCalc($estate);
        return PluralsService::units($unitProps['cnt']);
    }

    public function stateUnits(EstateData $estate)
    {
        $unitProps = $this->unitsCalc($estate);
    }

    public function getApiEstates(): Enumerable
    {
        $apiData = app(CrmMyApi::class)
            ->estateList(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            );

        session()->put('estates', $apiData);

        return EstateData::collection($apiData)->toCollection();
    }

    public function mount()
    {
        $this->estates = $this->getApiEstates();
    }

    public function render(): View
    {

        return view('my::livewire.estate-list', [
            'estates' => $this->estates,
            'currentEstate' => $this->currentEstate
        ]);
    }
}
