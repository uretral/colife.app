<?php

namespace Modules\My\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Estate\EstateData;
use Modules\My\Data\Payment\PaymentFinancialData;
use Modules\My\Entities\WorkLayout;
use Modules\My\Entities\WorkModel;
use Modules\My\Repositories\UserRepository;
use Modules\My\Services\EstateService;

class HomeController extends Controller
{

    public int $totalIncome = 0;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $stateData = EstateData::collection(app(CrmMyApi::class)
            ->estateList(
                UserRepository::getAuthUser()->bx_id,
                UserRepository::getAuthUserCountryCode()
            ))->toCollection();



        if ($stateData->count()) {
            $contract = $stateData->first()->contract;
            if ($contract && $layout = WorkModel::where('title', 'like', "%$contract%")->first()->getAttribute('view')) {
                return $this->$layout();
            } else {
                return $this->minimal();
            }
        } else {
            return $this->minimal();
        }


    }

    public function news()
    {
        app(EstateService::class);

        $financials = PaymentFinancialData::collection(app(CrmMyApi::class)->paymentFinancialData(
            UserRepository::getAuthUser()->bx_id,
            UserRepository::getAuthUserCountryCode()
        ))->toCollection();

        foreach ($financials as $financialData) {
            if ($financialData->type == 'Receive')
                $this->totalIncome = $this->totalIncome - (int)$financialData->amount->value;

            if ($financialData->type == 'Expenses')
                $this->totalIncome = $this->totalIncome + (int)$financialData->amount->value;
        }

        session()->put('totalIncome', $this->totalIncome);

        return $this->minimal();
    }

    public function minimal() {
       $this->template('minimal');
        return view('my::news');
    }

    public function summaryShort()
    {
        $this->template('medium');
        return view('my::summary', ['full' => false]);
    }

    public function summaryFull()
    {
        $this->template('maximum');
        return view('my::summary', ['full' => true]);
    }

    public function template(string $template) {
        session()->put('summaryTemplate', $template);
    }

}
