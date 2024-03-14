<form class="appeal-modal" wire:submit.prevent="submit">

    <x-my::form.select
        :options="$this->themes()"
        placeholder="{{ __('appeal-placeholder-theme') }}"
        title="{{ __('appeal-label-theme') }}"
        name="theme_id"
    />

    @if($this->themeTypes()->count())
    <x-my::form.select
        :options="$this->themeTypes()"
        placeholder="{{ __('appeal-placeholder-type') }}"
        title="{{ __('appeal-label-type') }}"
        name="theme_type_id"
    />
    @endif

    <x-my::form.textarea
        placeholder="{{ __('appeal-placeholder-problem') }}"
        title="{{ __('appeal-label-problem') }}"
        name="message"
    />

    <x-my::form.upload name="files" />


    <button class="accent">{{ __('appeal-btn-send') }}</button>

</form>
