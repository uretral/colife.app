@extends('my::tpl.main', ['bodyClass' => 'fixed'])
@section('main')
    <x-my::frame.left-menu >
        <div class="settings">

            <div class="settings-header">
                <x-my::menu.profile/>
            </div>

            <livewire:my::settings/>

        </div>
    </x-my::frame.left-menu>
@endsection
