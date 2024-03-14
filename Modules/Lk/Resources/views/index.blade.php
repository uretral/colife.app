@extends('lk::tpl.main')

@section('tenant-main')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('tenant.name') !!}
    </p>

    <div class="tenant">
        <h1>Tenant Account</h1>

        <img src="{{ vite::asset('Modules/Lk/Resources/assets/images/logotest.jpg') }}" alt="img"/>
        <img src="{{ vite::asset('Modules/Lk/Resources/assets/images/logo.svg') }}" alt="img"/>

    </div>
@endsection
