<div class="settings-body"  >

    <div class="loading" wire:loading.class="active" wire:loading.delay.short></div>

    <div class="settings-notification">
        <h2>{{ __('user-settings-notifications') }}</h2>
        <fieldset>
            <x-lk::ui.form.switcher
                name="user.attributes.cleaning"
                title="{{ __('user-settings-cleaning') }}"
                event="onSettingsChangeCleaning"
            />
            <x-lk::ui.form.switcher
                name="user.attributes.master"
                title="{{ __('user-settings-master') }}"
                event="onSettingsChangeMaster"
            />
        </fieldset>
    </div>
    <div class="settings-notice">
        <h2>{{ __('user-settings-payments-notices') }}</h2>
        <fieldset>
            <x-lk::ui.form.switcher
                name="user.attributes.email_notification"
                title="{{ __('user-settings-email') }}"
                event="onSettingsChangeEmail"
            />
            <x-lk::ui.form.switcher
                name="user.attributes.sms_notification"
                title="{{ __('user-settings-sms') }}"
                event="onSettingsChangeSms"
            />
        </fieldset>
    </div>

    <div class="settings-docs">
        <h2>{{ __('user-settings-documents') }}</h2>
        <fieldset>
            @if($this->apiFiles())
                @foreach($this->apiFiles() as $file)
                <x-lk::ui.form.download-link
                    :title="$file->name"
                    :link="$file->url"/>
                @endforeach
            @endif
            @if($this->files())
                @foreach($this->files() as $file)
                    <x-lk::ui.form.download-link
                        :title="$file->content->title"
                        :link="config('colife.storage_admin').$file->content->file"/>
                @endforeach
            @endif
            @if($this->userFiles())
                @foreach($this->userFiles() as $userFile)
                    <x-lk::ui.form.download-link
                        :title="$userFile['title']"
                        :link="$userFile['url']"/>
                @endforeach
            @endif
        </fieldset>
    </div>
    {{--asset('storage/'.$file->content->file)--}}
</div>
