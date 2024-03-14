@extends('lk::tpl.main', ['authorized' => true])
@section('title'){{ __('tenant.title.bonus_program') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <div class="bonus">
            <div class="bonus-header">
                <a href="{{ route('lk.profile') }}"></a> {{ __('tenant.title.bonus_program') }}
            </div>

            <x-lk::bonus-program/>

        </div>

    </x-lk::ui.frame.left-menu>
@endsection
