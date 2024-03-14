<div class="news-aside" :class="{active:  !news}">
    @if($title)
        <h2>{{$title}}</h2>
    @endif

    <div class="news-aside-cell">
        <h4>{{__('summary-col-number-of-apartments')}}</h4>
        <div class="news-aside-result">{{@Session::get('apartmentsCount')}}</div>
    </div>
    <div class="news-aside-cell">
        <h4>{{__('summary-col-busyness')}}</h4>
        <div class="news-aside-result">{{@Session::get('busynessPercent')}}%</div>
    </div>
    <div class="news-aside-cell">
        <h4>{{__('summary-col-total-income')}}</h4>
        <div class="news-aside-result">@money(@Session::get('totalIncome')) {!! \Modules\My\Repositories\UserRepository::getUserCurrency() !!}</div>
    </div>

</div>
