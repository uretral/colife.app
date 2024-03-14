@extends('layout::tpl.main', ['authorized' => false])
@section('main')

    <x-layout::ui.frame.section class="register">
        <form class="register-form">
            <h2>Добро пожаловать домой, Андрей</h2>
            <p>
                Давайте зарегистрируем ваш аккаунт. Вам нужно придумать пароль и добавить фото, если захотите
            </p>

            <x-layout::tenant-ui.block.badge/>

            <label class="password" x-data="{hidden:true, cnt: 6, val:''}">
                <span>Пароль</span>
                <span class="password-wrapper">
                    <input x-model="val" :type="hidden ? 'password' : 'text'"/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em x-show="val.length === 0 || val.length >= cnt">Минимум 6 символов, комбинация строчных и
                    заглавных</em>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">Не соответствует требованиям
                    безопасности: минимум 6 символов, комбинация строчных и заглавных</em>
            </label>

            <button class="accent full">Зарегистрироваться</button>

            <p>
                Возникли сложности? Обратитесь <a href="javascript:" class="link">в поддержку</a>
            </p>

        </form>

        <div class="register-images">
              ?
            <x-layout::static.welcome/>
        </div>
    </x-layout::ui.frame.section>

@endsection

