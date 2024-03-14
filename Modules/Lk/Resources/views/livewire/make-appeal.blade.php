<form class="appeal-modal" wire:submit.prevent="submit">

    <x-lk::ui.form.select
        :options="$this->themes()"
        placeholder="{{ __('appeal-placeholder-theme') }}"
        title="{{ __('appeal-label-theme') }}"
        name="theme_id"
    />

    @if(count($this->themeTypes()))
    <x-lk::ui.form.select
        :options="$this->themeTypes()"
        placeholder="{{ __('appeal-placeholder-type') }}"
        title="{{ __('appeal-label-type') }}"
        name="theme_type_id"
    />
    @endif

    <x-lk::ui.form.textarea
        placeholder="{{ __('appeal-placeholder-problem') }}"
        title="{{ __('appeal-label-problem') }}"
        name="message"
    />


    <x-lk::ui.form.upload name="files" :err="$errors->getMessages()" :files="$this->files"/>

    <button class="accent">{{ __('appeal-btn-send') }}</button>

</form>
