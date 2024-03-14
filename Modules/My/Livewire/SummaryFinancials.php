<?php

namespace Modules\My\Livewire;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Payment\PaymentExpenseData;
use Modules\My\Data\Payment\PaymentFinancialData;
use Modules\My\Data\Summary\FinancialChartData;
use Modules\My\Entities\Expense;
use Modules\My\Repositories\UserRepository;

class SummaryFinancials extends Component
{
    public Enumerable $financials;
    public Collection $preparedFinancials;
    public Collection $calendar;
    public int $financialsCount = 0;
    public array $chartData = [];
    public ?string $periodFrom = null;
    public ?string $periodTo = null;

    public array $types = [];


    public int $s = 0;

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

    #[On('onFinancialPeriodChanged')]
    public function onFinancialPeriodChanged($periodFrom, $periodTo)
    {
        $this->periodFrom = $periodFrom ? Carbon::parse($this->convertRu($periodFrom))->format("d.m.Y") : null;
        $this->periodTo = $periodTo ? Carbon::parse($this->convertRu($periodTo))->format("d.m.Y") : null;
        $this->barChart();
        $this->dispatch('onFinancialChartReady', $this->chartData);
    }

    public function setCalendar()
    {
        $today = Carbon::now()->format('Y-m');
        $yearAgo = Carbon::now()->subYear(1)->format('Y-m');

        $this->calendar = is_null($this->periodFrom) || is_null($this->periodTo)
            ? $this->monthly("$yearAgo-01", "$today-01")
            : $this->monthly($this->periodFrom, $this->periodTo);
    }

    public function barChart()
    {
        $this->getFinancials();
        $this->setCalendar();
        $this->prepareFinancials();

        $this->chartData = [];
        foreach ($this->calendar as $date) {
            $this->chartData['period'][] = $date;
            $this->chartData['receive'][] = array_sum($this->preparedFinancials->where('period', $date)->pluck('expense')->toArray());
            $this->chartData['expense'][] = array_sum($this->preparedFinancials->where('period', $date)->pluck('receive')->toArray());
        }
    }

    public function getExpenses(): Enumerable
    {
        $this->types = Expense::where('active', 1)->pluck('slug')->toArray();

        $expenses = PaymentExpenseData::collection(app(CrmMyApi::class)->paymentExpenseTransactions(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        ))->filter(function (PaymentExpenseData $data) {
            return in_array($data->payment_type, $this->types);
        })->toCollection();

        return PaymentFinancialData::collection($expenses)->toCollection();
    }

    public function getFinancials()
    {

        $financials = PaymentFinancialData::collection(app(CrmMyApi::class)->paymentFinancialData(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        ))->toCollection();

        $this->financials = $financials->merge($this->getExpenses());

        #Получение Данных по доходу - PaymentHistory всех жителей всех юнитов
//        dump(app(CrmMyApi::class)->paymentIncome(
//            UserRepository::getAuthUser()->bx_id,
//            UserRepository::getAuthUserCountryCode()
//        ));

//        dump($this->financials->where('type','=','Receive')->toArray());
//        dump($this->financials->where('type','=','Expenses')->toArray());

        $this->financialsCount = $this->financials->count();

        $this->dispatch('onGetFinancials', $this->financials);
    }

    public function prepareFinancials()
    {

        $this->preparedFinancials = collect([]);

        $this->financials->each(function (PaymentFinancialData $item) {

            $periods = $this->monthly($item->period_start, $item->period_end);
            if (!empty($item->amount) && !empty($item->amount->value)){
                $value = (float)$item->amount->value;
            }
            else{
                $value = 1;
            }
            $amount = $value / count($periods);
            foreach ($periods as $period) {
                $this->preparedFinancials->push([
                    'id' => $item->id,
                    'period' => $period,
                    'receive' => in_array($item->type,['Receive', null]) ? $amount : 0,
                    'expense' => $item->type === 'Expenses' ? $amount : 0,
                ]);
            }
        });
    }

    public function monthly($from, $to): Collection
    {
        $periods = collect([]);
        foreach (CarbonPeriod::create(Carbon::parse($from), '1 month', Carbon::parse($to)) as $period) {
            $periods->push($period->translatedFormat('M Y'));
        }
        return $periods;
    }

    public function mount()
    {

        $this->barChart();
    }

    public function render(): View
    {
        return view('my::livewire.summary-financials');
    }
}
