@extends('my::tpl.main')
@section('title')Подтвердите вашу почту@endsection
@section('main')

    <x-my::ui.frame.section class="register confirm">
        <form class="register-form">
            <h2>Подтвердите вашу почту</h2>
            <p>
                Мы отправили сообщение на {{ \request()->session()->get('email') }}. Перейдите по ссылке, чтобы активировать аккаунт.
            </p>

            <p>
                Возникли сложности? Обратитесь <a href="javascript:" class="link">в поддержку</a>
            </p>

        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-my::ui.frame.section>

@endsection

