@extends('my::tpl.main')
@section('title')Сброс пароля@endsection
@section('main')

    <x-my::frame.section class="register">
        <form method="POST" class="register-form" action="{{ route('my.password.email') }}">
            @csrf
            <h2>Сброс пароля</h2>
            <p>
                Введите e-mail, на который зарегистрирован аккаунт,
                мы отправим на него инструкции
            </p>
            <p>&nbsp;</p>

            <label x-data="{hidden:true, cnt: 4, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="email" name="email" value="{{ old('email') }}" required autofocus />
                     </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    Ошибка ввода Email
                </em>
                <x-my::form.input-error :messages="$errors->first()" class="error mt-2"/>
            </label>

            <button class="accent full">{{ __('auth.Reset Link') }}</button>

            <p>
                Возникли сложности? Обратитесь <a href="javascript:" class="link">в поддержку</a>
            </p>


        </form>

        <div class="register-images">
            <x-my::static.welcome/>
        </div>
    </x-my::frame.section>

@endsection
