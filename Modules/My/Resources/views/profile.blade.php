@extends('my::tpl.main', ['bodyClass' => 'fixed'])
@section('main')
    <x-my::frame.left-menu >
        <div class="profile">

            <div class="profile-header">
                <x-my::menu.profile/>
            </div>

            <div class="profile-body">
                <livewire:my::profile-card/>
                <livewire:my::profile-info/>
            </div>

        </div>

    </x-my::frame.left-menu>
@endsection
