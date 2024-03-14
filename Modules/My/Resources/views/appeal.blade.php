@extends('my::tpl.main', ['bodyClass' => 'fixed chat-box'])
@section("title"){{ __('my.title.appeals') }}@endsection
@section('main')
    <x-my::frame.left-menu>
        <livewire:my::switcher/>

        <livewire:my::appeals/>

        <x-my::frame.modal event="onAppealOpen" title="{{ __('appeal-modal-title') }}">
            <livewire:my::make-appeal />
        </x-my::frame.modal>

    </x-my::frame.left-menu>
@endsection
