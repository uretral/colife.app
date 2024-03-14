@extends('layout::tpl.main', ['authorized' => false])
@section('main')

    <x-layout::ui.frame.section class="register confirm">
        <form class="register-form">
            <h2>Подтвердите вашу почту</h2>
            <p>
                Мы отправили сообщение на p.ivanon@gmail.com. Перейдите по ссылке, чтобы активировать аккаунт.
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

