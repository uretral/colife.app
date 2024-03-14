@extends('lk::tpl.main')
@section('title'){{ __('auth-register-title') }}@endsection
@section('main')

    <x-lk::ui.frame.section class="register auth">
        <form action="{{ route('lk.login') }}" class="register-form" method="POST">
            @csrf
            <h2>{{ __('auth-register-h1') }}</h2>

           <label x-data="{hidden:true, cnt: 4, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="email" name="email" value="{{ old('email') }}" required/>
                     </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    {{ __('auth-login-email-error') }}
                </em>
               <x-lk::ui.form.input-error :messages="$errors->first()" class="error mt-2"/>
            </label>

            <label class="password" x-data="{hidden:true, cnt: 8, val:''}">
                <span>{{ __('auth-register-password') }}</span>
                <span class="password-wrapper">
                    <input name="password" x-model="val" :type="hidden ? 'password' : 'text'"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$"
                           required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">{{ __('auth-password-error') }}</em>
            </label>

            <button type="submit" class="accent full">{{ __('auth-login-btn') }}</button>

            <p>
                <a href="{{ route('lk.password.request')}}" class="link">{{ __('auth-password-remind') }}</a>
            </p>

            <x-lk::ui.block.support-link />


        </form>

        <div class="register-images">
            <x-lk::static.welcome/>
        </div>
    </x-lk::ui.frame.section>

@endsection

