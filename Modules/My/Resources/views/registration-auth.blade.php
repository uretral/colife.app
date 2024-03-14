@extends('layout::tpl.main', ['authorized' => false])
@section('main')

    <x-layout::ui.frame.section class="register auth">
        <form class="register-form">
            <h2>Добро пожаловать домой</h2>

            <label x-data="{hidden:true, cnt: 6, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="text"/>
                     </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">Не соответствует требованиям
                    безопасности: минимум 6 символов, комбинация строчных и заглавных</em>
            </label>

            <label class="password" x-data="{hidden:true, cnt: 6, val:''}">
                <span>Пароль</span>
                <span class="password-wrapper">
                    <input x-model="val" :type="hidden ? 'password' : 'text'"/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">Не соответствует требованиям
                    безопасности: минимум 6 символов, комбинация строчных и заглавных</em>
            </label>

            <button class="accent full">Войти</button>

            <p>
                <a href="javascript:" class="link">Не помню пароль</a>
            </p>

            <p>
                Возникли сложности? Обратитесь <a href="javascript:" class="link">в поддержку</a>
            </p>


        </form>

        <div class="register-images">
            <x-layout::static.welcome/>
        </div>
    </x-layout::ui.frame.section>

@endsection

