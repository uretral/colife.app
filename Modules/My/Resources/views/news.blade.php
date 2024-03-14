@extends('my::tpl.main', ['bodyClass' => 'fixed'])
@section('main')
    <x-my::frame.left-menu >

        <div class="news" x-data="{news: true}">

            <h1>{{__('news-greeting')}} {{ auth()->user()->name  }}!</h1>

            <p>{{__('news-greeting-slogan')}}</p>

            <div class="news-row">
                <div class="news-switcher">
                    <div class="switcherMenu">
                        <button :class="{active:  !news}" @click="news = false">{{__('news-btn-finance')}}</button>
                        <button :class="{active: news}" @click="news = true">{{__('news-news')}}</button>
                    </div>
                </div>
                <livewire:my::news/>

                @if(session('summaryTemplate') == 'minimal')
                    <livewire:my::aside-summary  title="{{__('news-key-indicators')}}"/>
                @endif
            </div>

        </div>

    </x-my::frame.left-menu>
@endsection
