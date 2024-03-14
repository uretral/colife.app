@extends('lk::tpl.main', ['authorized' => true])
@section("title"){{ __('tenant.title.faq') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu x-data="{inters: 0}">
        <livewire:lk::switcher/>

        <x-lk::faq/>

        <x-lk::ui.frame.modal event="modal" title="{{ __('appeal-modal-title') }}">
            <livewire:lk::make-appeal />
        </x-lk::ui.frame.modal>

    </x-lk::ui.frame.left-menu>
@endsection

