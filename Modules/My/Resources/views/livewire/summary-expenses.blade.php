<div class="charts-col chart-expenses">

    <h3>{{__('summary-block-expenses')}}</h3>

    @if($expensesCount)
        <div class="charts-col-inner">
            <div class="charts-col-row">
                <div class="charts-col-cell" wire:ignore>
                    <label class="monthPicker expenses-picker"
                           x-data="monthRangePicker(@js(\App::getLocale()))"
                           x-ref="datepickerNest"
                    >
                        <input type="text" x-ref="datepicker" x-model="model"
                               placeholder="{{__('summary-placeholder-select-period')}}" readonly="readonly">
                        <button @click="reset()" x-show="model"></button>
                    </label>
                </div>
            </div>

            <div class="charts-col-row">
                <div class="charts-col-cell" x-data="chartDoughnut({
                    costs: @js($types->pluck('cost')->toArray()),
                    colors: @js($types->pluck('color')->toArray()),
                    locales: @js($types->pluck('locale')->toArray())
                 })" wire:ignore>
                    <canvas id="chartExpenses" x-ref="chart"></canvas>
                </div>
                <div class="charts-col-cell">
                    @foreach($types as $chartData)
                        <x-my::block.chart-label
                            name="{{$chartData->locale}}"
                            color="{{$chartData->color}}"
                            prop="{{$chartData->cost}}"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="charts-col-inner">
            <p>
                {{__('summary-no-expenses')}}
            </p>
        </div>

    @endif
</div>
