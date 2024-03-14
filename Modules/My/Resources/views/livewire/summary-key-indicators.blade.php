<div class="charts-col chart-indicators">

    <h3>{{__('summary-block-key-indicators')}}</h3>

    <div class="charts-col-inner tall">
        <h4>{{__('summary-col-number-of-apartments')}}</h4>

        <div class="charts-col-result">
            <b>{{$apartmentsCount}}</b>
        </div>
    </div>
    <div class="charts-col-inner tall">
        <h4>{{__('summary-col-busyness')}}</h4>
        <div class="charts-col-result">
            <b>
                {{$busynessPercent}}%
            </b>
        </div>
    </div>
    <div class="charts-col-inner tall">
        <h4>{{__('summary-col-total-income')}}</h4>
        <div class="charts-col-result">
            <b>@money($totalIncome) {!! \Modules\My\Repositories\UserRepository::getUserCurrency() !!}</b>
        </div>
    </div>

    <div class="charts-col-inner">
        <h4>{{__('summary-col-status-of-apartments')}}</h4>

        <div class="charts-col-result">
            <div class="charts-col-row">
                <div class="charts-col-cell">
                    <h5>{{__('summary-cell-fully-commissioned')}}</h5>
                    <b>{{$apartmentsBusy}}</b>
                </div>
                <div class="charts-col-cell">
                    <h5>{{__('summary-cell-in-search-of-tenants')}}</h5>
                    <b>{{$apartmentsEmpty}}</b>
                </div>
                <!-- todo:uretral  Показы -->
{{--                <div class="charts-col-cell">
                    <h5>{{__('summary-cell-impressions-of-free')}}</h5>
                    <b>16</b>
                </div>--}}
            </div>
        </div>

    </div>
    <!-- todo:uretral  Показы список -->
{{--    <div class="charts-col-inner">
        <h4>{{__('summary-col-listings')}}</h4>
        <div class="charts-col-result chart-list">
            <div class="chart-row">
                <a href="javascript:">{{__('summary-cell-listings-0')}}</a>
                <span class="see"> 50</span>
            </div>

            <div class="chart-row">
                <a href="javascript:">{{__('summary-cell-listings-1')}}</a>
                <span class="see"> 370</span>
            </div>

            <div class="chart-row">
                <a href="javascript:">{{__('summary-cell-listings-2')}}</a>
                <span class="see"> 68</span>
            </div>

            <div class="chart-row">
                <a href="javascript:">{{__('summary-cell-listings-3')}}</a>
                <span class="see"> 455</span>
            </div>
        </div>
    </div>--}}


</div>
