<?php

namespace Modules\My\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Estate\EstatePaymentsData;
use Modules\My\Repositories\FakeApi\PaymentsListApiGenerator;
use Modules\My\Repositories\UserRepository;

class PaymentUtility extends Component
{

    public ?Enumerable $apiData;

    public array $estateButtons = [];
    public string $estateButton = '';

    public array $paymentPurposes = [2,3];
    public ?string $dateBetween = null;
    public array $estates = [];
    public bool $filtering = false;

    public function mount(PaymentsListApiGenerator $apiGenerator)
    {
        $this->apiData = EstatePaymentsData::collection(
            app(CrmMyApi::class)->paymentFinancialData(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            )
        )->toCollection();
       $this->estateButtons();
    }

    #[Computed]
    public function payments(): Enumerable
    {

        return $this->apiData->filter(function (EstatePaymentsData $item) {

            $results = [];

            if ($this->paymentPurposes) {
                $results[] = in_array($item->payment_purpose , $this->paymentPurposes);
            }

            if ($this->dateBetween) {
                $results[] = $this->prepareDate($item->date);
            }

            if ($this->estates) {
                $results[] = in_array($item->estate_id, $this->estates);
            }

            return !in_array(false, $results);
        });
    }

    public function prepareDate($dateStr): ?bool
    {
        $split = preg_split("/(—|-)/", $this->dateBetween);
        if (is_array($split) && count($split) === 2) {
            return Carbon::createFromFormat('d.m.y', $dateStr)->between(
                Carbon::createFromFormat('d.m.y', trim($split[0])),
                Carbon::createFromFormat('d.m.y', trim($split[1]))
            );
        } else {
            return null;
        }
    }

    public function estateButtons(): array
    {
        $this->apiData->each(function ($estate) {
            if (!array_key_exists($estate->apartment->estate_id, $this->estateButtons)) {
                $this->estateButtons[$estate->apartment->estate_id] = $estate->apartment->estate_address;
            }
        });
        return $this->estateButtons;
    }

    public function filterByEstateItem($key)
    {
        if (in_array($key, $this->estates)) {
            $this->estates = array_diff($this->estates, [$key]);
        } else {
            $this->estates[] = $key;
        }

        $this->estateButton = $this->estateButtons[$key];
    }

    public function resetEstate() {
        $this->estates = [];
        $this->estateButton = '';
    }

    public function resetFilters()
    {
        $this->dateBetween = null;
        $this->estates = [];
        $this->estateButton = '';
    }

    public function render(): View
    {
        return view('my::livewire.payment-utility');
    }
}
