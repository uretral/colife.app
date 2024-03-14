@extends('lk::tpl.main', ['authorized' => true])
@section("title")
    {{__('payments-title')}}
@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <div class="errors coming-soon">
            <div class="errors-view">
                <img src="{{ vite::asset('Modules/Lk/Resources/assets/img/bg/error-bg.svg') }}" alt="error-page"/>
                <p>
                    <b>Coming soon :)</b>

                </p>
            </div>
        </div>
    </x-lk::ui.frame.left-menu>
@endsection
