<?php

namespace Modules\My\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Payment\PaymentExpenseData;
use Modules\My\Data\Summary\ExpenseTypeData;
use Modules\My\Entities\Expense;
use Modules\My\Repositories\UserRepository;

class SummaryExpenses extends Component
{
    #[Locked]
    public Enumerable $expenses;
    public Enumerable $types;
    public int $expensesCount = 0;
    public ?string $periodFrom = null;
    public ?string $periodTo = null;


    public function splitExpenses()
    {
        $this->expenses = $this->getExpenses();
        $this->expensesCount = $this->expenses->count();
        $this->types = ExpenseTypeData::collection(Expense::where('active', 1)->get()->each(function ($item) {
            $costs = array_sum(
                $this->expenses->where('payment_type', $item->slug)
                    ->when(!is_null($this->periodFrom), function ($query) {
                        return $query->whereBetween('period_start', [$this->periodFrom, $this->periodTo]);
                    })
                    ->pluck('amount.value')->toArray()
            );
            $item->cost = $costs ?? 0;
            $item->locale = __('summary-cell-' . $item->slug);
        }))->toCollection();
    }

    public array $replace = [
        'Янв' => 'Jan',
        'Фев' => 'Feb',
        'Март' => 'Mar',
        'Апр' => 'Apr',
        'Май' => 'May',
        'Июнь' => 'Jun',
        'Июль' => 'Jul',
        'Авг' => 'Aug',
        'Сен' => 'Sep',
        'Окт' => 'Oct',
        'Ноя' => 'Nov',
        'Дек' => 'Dec'
    ];

    public function convertRu($period): ?string
    {
        $periods = explode('.', trim($period));
        if ($period && array_key_exists($periods[0], $this->replace)) {
            return $this->replace[$periods[0]] . '. ' . $periods[1];
        } else {
            return $period;
        }
    }


    #[On('onExpensesPeriodChanged')]
    public function periodChanged($periodFrom, $periodTo)
    {
        $this->periodFrom = $periodFrom ? Carbon::parse($this->convertRu($periodFrom))->format("d.m.Y") : null;
        $this->periodTo = $periodTo ? Carbon::parse($this->convertRu($periodTo))->format("d.m.Y") : null;
        $this->splitExpenses();
        $this->dispatch('onExpensesChartReady', $this->payload());
    }

    public function payload(): array
    {
        return [
            'costs' => $this->types->pluck('cost')->toArray(),
            'colors' => $this->types->pluck('color')->toArray(),
            'locales' => $this->types->pluck('locale')->toArray()
        ];
    }

    public function getExpenses(): Enumerable
    {
        return PaymentExpenseData::collection(app(CrmMyApi::class)->paymentExpenseTransactions(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        ))->toCollection();
    }


    public function mount()
    {
        $this->splitExpenses();
    }

    public function render(): View
    {
        return view('my::livewire.summary-expenses');
    }
}
