<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\My\Data\Estate\EstateData;
use Modules\My\Entities\User;
use Modules\My\Helpers\PluralsService;
use Modules\My\Repositories\FakeApi\ApiGenerator;
use Modules\My\Repositories\FakeApi\EstatesListApiGenerator;
use Spatie\LaravelData\DataCollection;

class EstateItem extends Component
{
    #[Locked]
    public string $id;

    public EstateData $estate;

    public array $photos = [];

    public function goToPaymentRent($id)
    {
       return redirect()->to('/payments-rent/'.$id);
    }

    public function onOpenGallery($id)
    {
        $estate = $this->estates->where('id',$id)->first();
        $this->photos = $estate->photos;
        $this->dispatch('onOpenGallery', open: true);
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


    public function mount(EstatesListApiGenerator $apiGenerator)
    {
        $estates = EstateData::collection(session('estates'))->toCollection();
        $this->estate = $estates->where('id','=',request('id'))->first();
    }

    public function render(): View
    {
        return view('my::livewire.estate-item', [
//            'estate' => $this->estate,
        ]);
    }
}
