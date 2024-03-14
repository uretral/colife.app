@extends('lk::tpl.main')
@section('title'){{ __('forgot-password-confirm-title') }}@endsection
@section('main')

    <x-lk::ui.frame.section class="register confirm">
        <form class="register-form">
            <h2>{{ __('forgot-password-confirm-title') }}</h2>
            <p>
                {{ __('forgot-password-confirm-text', ['email' => \request()->session()->get('email')]) }}
            </p>

            <x-lk::ui.block.support-link />

        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-lk::ui.frame.section>

@endsection

