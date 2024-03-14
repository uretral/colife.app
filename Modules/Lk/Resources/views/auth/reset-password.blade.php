@extends('lk::tpl.main')
@section('title'){{ __('forgot-password-title') }}@endsection
@section('main')

    <x-lk::ui.frame.section class="register">
        <form method="POST" class="register-form" action="{{ route('lk.password.store') }}">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ @$request->email }}">
            @csrf
                <h2>{{ __('auth-reset-password-h1') }}</h2>

            @if($errors->any())
                <label><em class="error">
                        <span>{{ @$errors->first() }}</span>

                    </em></label>
            @endif

            <label x-data="{hidden:true, cnt: 4, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="text" value="{{ $request->email ?? old('email')}} " disabled />
                     </span>

                <em class="error">  </em>
            </label>

            <label class="password" x-data="passwordInput">
                <span>{{ __('auth-register-password') }}</span>
                <span class="password-wrapper">
                    <input name="password" x-model="val" :type="hidden ? 'password' : 'text'" @keyup="checkPassword"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$"
                           required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="error">{{ __('auth-password-error') }}</em>
            </label>

            <label class="password" x-data="{hidden:true, cnt: 8, val:''}">
                <span>{{ __('auth-password-confirm') }}</span>
                <span class="password-wrapper">
                    <input name="password_confirmation" x-model="val" :type="hidden ? 'password' : 'text'"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$"
                           required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    <span></span>
                </em>
            </label>

            <button class="accent full">{{ __('auth-reset-link-btn') }}</button>

            <x-lk::ui.block.support-link />


        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-lk::ui.frame.section>

@endsection
