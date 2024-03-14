@extends('my::tpl.main')
@section('title'){{__('auth-authorization')}}@endsection
@section('main')

    <x-my::frame.section class="register auth">
        <form action="{{ route('my.login') }}" class="register-form" method="POST">
            @csrf
            <h2>{{__('auth-welcome')}}</h2>

           <label x-data="{hidden:true, cnt: 4, val:''}">
                <span>E-mail</span>
                <span class="password-wrapper">
                <input type="email" name="email" value="{{ old('email') }}" required/>
                     </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">
                    {{__('auth-error-email')}}
                </em>
               <x-my::form.input-error :messages="$errors->first()" class="error mt-2"/>
            </label>

            <label class="password" x-data="{hidden:true, cnt: 8, val:''}">
                <span>{{__('auth-password')}}</span>
                <span class="password-wrapper">
                    <input name="password" x-model="val" :type="hidden ? 'password' : 'text'" required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em class="error" x-show="val.length !== 0 && val.length < cnt">{{__('auth-error-password')}}</em>
            </label>

            <button type="submit" class="accent full">{{__('auth-enter')}}</button>

            <p>
                <a href="{{ route('my.password.request')}}" class="link">{{__('auth-forgot-password')}}</a>
            </p>

            <p>
                <x-my::block.support-link/>
            </p>


        </form>

        <div class="register-images">
            <x-my::static.welcome/>
        </div>
    </x-my::frame.section>

@endsection

