@extends('lk::tpl.main', ['authorized' => true])
@section("title"){{ __('tenant.title.chats') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu>

        <livewire:lk::switcher/>

        <livewire:lk::chat/>

        <x-lk::ui.frame.modal event="onOpenAppealForm" title="{{ __('appeal-modal-title') }}">
            <livewire:lk::make-appeal />
        </x-lk::ui.frame.modal>

    </x-lk::ui.frame.left-menu>
@endsection

