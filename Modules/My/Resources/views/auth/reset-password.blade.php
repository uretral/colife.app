@extends('my::tpl.main')
@section('title')Сброс пароля@endsection
@section('main')

    <x-my::ui.frame.section class="register">
        <form method="POST" class="register-form" action="{{ route('my.password.store') }}">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ @$request->email }}">
            @csrf
            <h2>Придумайте новый пароль</h2>


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
                <span>Пароль</span>
                <span class="password-wrapper">
                    <input name="password" x-model="val" :type="hidden ? 'password' : 'text'" @keyup="checkPassword"/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="error">Не соответствует требованиям
                    безопасности: минимум 8 символов, комбинация строчных и заглавных</em>
            </label>

            <label class="password" x-data="{hidden:true, cnt: 8, val:''}">
                <span>Подтвердите пароль</span>
                <span class="password-wrapper">
                    <input name="password_confirmation" x-model="val" :type="hidden ? 'password' : 'text'" required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    <span></span>
                </em>
            </label>

            <button class="accent full">{{ __('auth.Reset Link') }}</button>

            <p>
                Возникли сложности? Обратитесь <a href="javascript:" class="link">в поддержку</a>
            </p>


        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-my::ui.frame.section>

@endsection
