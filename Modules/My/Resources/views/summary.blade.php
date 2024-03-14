@extends('my::tpl.main', ['bodyClass' => 'fixed'])
@section('main')
    <x-my::frame.left-menu>
        <div class="charts">
            <h1>{{__('summary-hi')}} {{auth()->user()->name}}!</h1>
            <p>{{__('summary-greeting')}}</p>
            <div class="charts-row" x-data="{news: true}">

                <div class="news-switcher item">
                    <div class="switcherMenu">
                        <button :class="{active: news}" @click="news = true">{{__('summary-btn-finance')}}</button>
                        <button :class="{active:  !news}" @click="news = false">{{__('summary-btn-news')}}</button>
                    </div>
                </div>

                <div class="charts-cols" :class="{active:  news}">

                    <livewire:my::summary-key-indicators/>

                    <livewire:my::summary-financials/>

                    <livewire:my::summary-expenses/>

                    @if($full)
                        <livewire:my::summary-investment/>
                    @endif


                </div>

                <livewire:my::aside-news/>

            </div>

        </div>

    </x-my::frame.left-menu>
@endsection
