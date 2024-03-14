<?php

namespace Modules\My\Livewire\Forms;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Form;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Payment\PaymentExpenseData;
use Modules\My\Data\Summary\ExpenseTypeData;
use Modules\My\Entities\Expense;
use Modules\My\Repositories\UserRepository;

class SummaryExpensesForm extends Form
{
    public Enumerable $expenses;
    public ?string $periodFrom = null;
    public ?string $periodTo = null;

    public function mounted()
    {
        $this->expenses = $this->getExpenses();
    }

    public function getExpenses(): Enumerable
    {
        return PaymentExpenseData::collection(app(CrmMyApi::class)->paymentExpenseTransactions(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        ))->toCollection();
    }

    public function periodChanged($periodFrom, $periodTo)
    {

        $this->periodFrom = $periodFrom ? Carbon::parse(trim($periodFrom))->format("d.m.Y") : null;
        $this->periodTo = $periodTo ? Carbon::parse(trim($periodTo))->format("d.m.Y") : null;
//        $this->splitExpenses();
    }


    #[Computed]
    public function splitExpenses(): Enumerable
    {
        return ExpenseTypeData::collection(Expense::where('active', 1)->get()->each(function ($item) {
            $costs = array_sum(
                $this->expenses->where('payment_type', $item->slug)
//                    ->when(!is_null($this->periodFrom), function ($query) {
//                        $query->where('period_start', '>=', $this->periodFrom);
//                        $query->where('period_end', '<=', $this->periodTo);
//                    })
                    ->pluck('amount.value')->toArray()
            );
            $item->cost = $costs ?? 0;
            $item->locale = __('summary-cell-' . $item->slug);
        }))->toCollection();
    }


}
