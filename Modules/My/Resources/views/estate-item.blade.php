@extends('my::tpl.main', ['authorized' => true, 'bodyClass' => 'fixed'])
@section('main')

    <x-my::frame.left-menu>

        <livewire:my::estate-item/>

    </x-my::frame.left-menu>

@endsection
