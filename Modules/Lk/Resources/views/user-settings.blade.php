@extends('lk::tpl.main', ['authorized' => true])
@section("title"){{ __('tenant.title.user_settings') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <div class="settings">

            <div class="settings-header">
                <x-lk::ui.block.user-header-menu/>
            </div>

            <livewire:lk::user-settings/>

        </div>
    </x-lk::ui.frame.left-menu>
@endsection
