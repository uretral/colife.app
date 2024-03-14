@extends('lk::tpl.main')
@section('title'){{ __('auth-register-title') }}@endsection
@section('main')

    <x-lk::ui.frame.section class="register" >
        <form action="{{ route('lk.register') }}" class="register-form" method="POST"
              enctype='multipart/form-data'
              x-data="{chb: true, agreement: false}">
            @csrf
            <input type="hidden" name="contactID" value="{{ @$data->contactId ?? null }}">
            <input type="hidden" name="roleName" value="{{ @$data->roleName ?? 'tenant' }}">
            <input type="hidden" name="email" value="{{ @$data->email }}">
            <input type="hidden" name="name" value="{{ @$data->shortName }}">
            <input type="hidden" name="locale" value="{{ @$data?->locale }}">
            <input type="hidden" name="code" value="{{ @$data?->code }}">

            <h2>{{ __('auth-register-h1') }}{{ @$data->shortName ? ", " . $data->shortName : '' }}</h2>

            <p>{{ __('auth-register-text') }}</p>

            <x-lk::ui.block.badge
                name="{{ @$data->name ?? __('auth-user-undefined') }}"
                email="{{ @$data->email }}"
            />

            <label class="password" x-data="passwordInput">
                <span>{{ __('auth-register-password') }}</span>
                <span class="password-wrapper">
                    <input name="password" x-model="val" :type="hidden ? 'password' : 'text'" @keyup="checkPassword"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$"
                           required/>
                    <button type="button" @click="hidden = !hidden"></button>
                </span>
                <em x-show="val.length === 0">{{ __('auth-password-requirements') }}</em>
                <em class="error" x-show="error">{{ __('auth-password-error') }}</em>
            </label>


            <button type="submit" class="accent full"
                    x-on:click="!agreement ? alert('{{ __('auth-agreement-requirements') }}') : ''">{{ __('auth-register-btn') }}</button>

            <label class="checkbox dark" >
                <input type="checkbox" @change="chb = $refs.chb.checked" x-ref="chb" name="agreement" x-model="agreement" :checked="agreement"  required/>
                <span>{{ __('auth-agreement') }}</span>
            </label>


            <x-lk::ui.block.support-link />

        </form>

        <div class="register-images">
            <x-static.welcome/>
        </div>
    </x-lk::ui.frame.section>

@endsection

