@extends('lk::tpl.main', ['authorized' => true])
@section("title")
    {{__('payments-title')}}
@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <div class="payments" x-data="{history: false}">
            <div class="payments-switcher"></div>
{{--            <x-lk::payment-to-pay/>--}}
            <button class="sw" :class="{active: history}" id="toHistory" data-cnt="0"
                    @click="history = true">{{__('payments-history')}}</button>
            <livewire:lk::payment-history/>
        </div>
    </x-lk::ui.frame.left-menu>
@endsection
