@extends('my::tpl.main', ['bodyClass' => 'fixed'])
@section('main')
    <x-my::frame.left-menu>

        <div class="payments">

            <div class="payments-header">
{{--                <x-my::menu.payment/>--}}
                <h2>{{__('payments-history')}}</h2>
            </div>

            <livewire:my::payment-rent/>

        </div>

    </x-my::frame.left-menu>
@endsection
