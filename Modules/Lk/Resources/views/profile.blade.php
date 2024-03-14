@extends('lk::tpl.main', ['authorized' => true])
@section("title"){{ __('tenant.title.user_profile') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <div class="profile">

            <div class="profile-header">
                <x-lk::ui.block.user-header-menu/>
            </div>

            <div class="profile-body">

                <livewire:lk::profile-card/>

                <livewire:lk::profile-info/>
            </div>

        </div>
    </x-lk::ui.frame.left-menu>
@endsection
