@extends('my::tpl.main', ['bodyClass' => 'fixed chat-box'])
@section("title"){{ __('my.title.faq') }}@endsection
@section('main')
    <x-my::frame.left-menu x-data="{inters: 0}">
        <livewire:my::switcher/>

        <x-my::faq/>

        <x-my::frame.modal event="onAppealOpen" title="{{ __('appeal-modal-title') }}">
            <livewire:my::make-appeal />
        </x-my::frame.modal>

    </x-my::frame.left-menu>
@endsection

