<div class="settings-body">
    {{--
    <div class="settings-notification">
        <h2>{{ __('user-settings-notifications') }}</h2>

        <fieldset>
            <x-my::form.switcher
                name="userAttributes.cleaning"
                title="{{ __('user-settings-cleaning') }}"
            />
            <x-my::form.switcher
                name="userAttributes.master"
                title="{{ __('user-settings-master') }}"
            />
        </fieldset>
    </div>
    <div class="settings-notice">
        <h2>{{ __('user-settings-payments-notices') }}</h2>
        <fieldset>
            <x-my::form.switcher
                name="userAttributes.email_notification"
                title="{{ __('user-settings-email') }}"
            />
            <x-my::form.switcher
                name="userAttributes.sms_notification"
                title="{{ __('user-settings-sms') }}"
            />
        </fieldset>
    </div>
    --}}
    <div class="settings-docs">
    <h2>{{__('user-settings-documents')}}</h2>
        <fieldset>
            @if($apiFiles)
                @foreach($apiFiles as $file)
                    <x-my::form.download-link
                        :title="$file->name"
                        :link="$file->url"/>
                @endforeach
            @endif
            @foreach($files as $file)
                <x-my::form.download-link
                    :title="$file['title']"
                    :link="$file['link']"/>
            @endforeach
        </fieldset>
    </div>
</div>
