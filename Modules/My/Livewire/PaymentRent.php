<?php

namespace Modules\My\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\My\Data\Estate\EstatePaymentsData;
use Modules\My\Data\Payment\PaymentFinancialData;
use Modules\My\Repositories\FakeApi\PaymentsListApiGenerator;
use Modules\My\Repositories\UserRepository;

class PaymentRent extends Component
{

    public ?Enumerable $apiData;
    public int $paymentPurpose = 1;
    public ?string $periodFrom = null;
    public ?string $periodTo = null;
    public ?string $type = null;
    public array $estateButtons = [];
    public ?int $estateId = null;
    public ?string $estateAddress = null;
    public bool $isEstatePage = false;

    public function mount(PaymentsListApiGenerator $apiGenerator)
    {
        $this->apiData = PaymentFinancialData::collection(
            app(CrmMyApi::class)->paymentFinancialData(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            )
        )->toCollection();
        $this->estateButtons();
        $this->estateId = request()->segment(2);
        if ($estateId = request()->segment(2)) {
            $this->isEstatePage = true;
            $this->setButton($estateId);
        }

    }

    #[On('onPeriodChanged')]
    public function onPeriodChanged($periodFrom, $periodTo)
    {
        $this->periodFrom = $periodFrom ? Carbon::createFromFormat('d.m.y', trim($periodFrom))->format("d.m.Y") : null;
        $this->periodTo = $periodTo ? Carbon::createFromFormat('d.m.y', trim($periodTo))->format("d.m.Y") : null;
    }

    #[Computed]
    public function payments(): Enumerable
    {
        return $this->apiData
            ->whereNotNull('amount.value')
            ->when($this->periodFrom && $this->periodTo, function ($query) {
                return $query->filter(function ($item) {
                    return Carbon::parse($item->date)->gte($this->periodFrom) && Carbon::parse(trim($item->date))->lte($this->periodTo);
                });
            })
            ->when($this->estateId, function ($query) {
                return $query->where('apartment.estate_id', '=', $this->estateId);
            });
    }

    #[Computed]
    public function isFiltered(): bool
    {
        return $this->periodFrom || $this->periodTo || $this->estateId;
    }

    public function estateButtons(): array
    {
        $this->apiData->each(
            function ($estate) {
                if (!array_key_exists($estate->apartment->estate_id, $this->estateButtons)) {
                    $this->estateButtons[$estate->apartment->estate_id] = $estate->apartment->estate_address;
                }
            }
        );
        return $this->estateButtons;
    }

    public function setButton($id)
    {
        $this->estateId = $id;
        if (array_key_exists($this->estateId, $this->estateButtons)) {
            $this->estateAddress = $this->estateButtons[$this->estateId];
        }

    }

    public function resetPeriod()
    {
        $this->periodFrom = null;
        $this->periodTo = null;
    }

    public function resetEstate()
    {
        $this->estateId = null;
        $this->estateAddress = null;
    }

    public function resetFilters()
    {
        $this->resetPeriod();
        if (!$this->isEstatePage) {
            $this->resetEstate();
        }
        $this->dispatch('onSetUpDatePicker', null);
    }

    public function render(): View
    {
        return view('my::livewire.payment-rent');
    }

    // todo тип контракта ,  слайдер, жилец - пэиментс хистори
}
