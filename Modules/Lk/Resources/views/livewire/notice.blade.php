@foreach($notices as $notice)

    <x-lk::ui.block.aside-notice
        title="{{ @$notice?->type }}"
        description="{{ @$notice?->description }}"
        bottom="{{@\Carbon\Carbon::parse($notice?->deadline)->translatedFormat('l, j F')}}">

        {{ Modules\Lk\Services\PluralsService::cleaningPeriods($notice->period) }}

    </x-lk::ui.block.aside-notice>
@endforeach
