@extends('lk::tpl.main', ['authorized' => true])
@section("title"){{ __('tenant.title.appeals') }}@endsection
@section('main')
    <x-lk::ui.frame.left-menu>
        <livewire:lk::switcher/>

        <livewire:lk::appeals/>

        <x-lk::ui.frame.modal event="modal" title="{{ __('appeal-modal-title') }}">
            <livewire:lk::make-appeal />
        </x-lk::ui.frame.modal>

    </x-lk::ui.frame.left-menu>
@endsection
