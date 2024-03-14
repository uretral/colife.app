<div class="charts-col chart-turnover">

    <h3>{{__('summary-block-turnover')}}</h3>

    @if($financialsCount)
    <div class="charts-col-inner">
        <div class="charts-col-row">
            <div class="charts-col-cell" wire:ignore>
                <label class="monthPicker financials-picker"
                       x-data="monthRangePickerTurnover(@js(\App::getLocale()))"
                       x-ref="datepickerNestTurnover"
                >
                    <input type="text" x-ref="datepickerTurnover" x-model="turnover"
                           placeholder="{{__('summary-placeholder-select-period')}}" readonly="readonly">
                    <button @click="reset()" x-show="turnover"></button>
                </label>
            </div>
            <div class="charts-col-cell" x-data="chartBar(@js($chartData), '{{__('summary-cell-total-income')}}','{{__('summary-cell-total-expense')}}')">
                <canvas id="chartTurnover" x-ref="chart"></canvas>
            </div>
            <div class="charts-col-cell">
                <x-my::block.chart-label name="{{__('summary-cell-total-income')}}" color="#F48434" prop="{{array_sum($chartData['receive'])}}"/>
                <x-my::block.chart-label name="{{__('summary-cell-total-expense')}}" color="#262D40" prop="{{array_sum($chartData['expense'])}}"/>
            </div>
        </div>


    </div>
    @else
    <div class="charts-col-inner">
        <p>
            {{__('summary-no-turnover')}}
        </p>
    </div>
    @endif
</div>
