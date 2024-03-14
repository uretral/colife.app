@extends('lk::tpl.main')
@section("title"){{__('articles-title')}}@endsection
@section('main')

    <x-lk::ui.frame.left-menu>
        <div class="primary-header">
            <b>{{__('articles-greeting')}} {{@\auth()->user()->name}}!</b>
            <p>
                {{__('articles-greeting-slogan')}}
            </p>
        </div>

        <livewire:lk::article/>

        <div class="primary-aside">
            <livewire:lk::notice/>

{{--            <x-lk::ui.block.aside-notice title="Следующий платёж" description="До 29 мая 2023" bottom="78 700 ₽">
                <button class="accent">Оплатить</button>
            </x-lk::ui.block.aside-notice>--}}
        </div>

    </x-lk::ui.frame.left-menu>
@endsection
