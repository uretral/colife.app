@extends('lk::tpl.main')
@section('title'){{ __('forgot-password-title') }}@endsection
@section('main')

    <x-ui.frame.section class="register">
        <form method="POST" class="register-form" action="{{ route('lk.password.email') }}">
            @csrf
            <h2>{{ __('forgot-password-title') }}</h2>
            <p>
                {{ __('forgot-password-text') }}
            </p>
            <p>&nbsp;</p>

            <label x-data="{hidden:true, cnt: 4, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="email" name="email" value="{{ old('email') }}" required autofocus />
                     </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    {{ __('forgot-password-email-error') }}
                </em>
                <x-form.input-error :messages="$errors->first()" class="error mt-2"/>
            </label>

            <button class="accent full">{{ __('auth-reset-link-btn') }}</button>

            <x-lk::ui.block.support-link />


        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-ui.frame.section>

@endsection
