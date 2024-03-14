
<div class="profile-info" >

    <div class="loading" wire:target="save" wire:loading.class="active"></div>

    <h2>{{ __('profile-additional-info') }}</h2>

    <form wire:submit.prevent="save">
        <p>
            {{ __('profile-additional-about') }}
        </p>

        <x-lk::ui.form.select
            :options="$this->positions()"
            title="{{ __('profile-position-title') }}"
            placeholder="{{ __('profile-position-select') }}"
            name="user.attributes.position_id"
            :value="$user->attributes->position_id"
        />

        <x-lk::ui.form.select-buttons
            title="{{ __('profile-interests') }}"
            :options="$this->interests()"
            :limit="$limit"
            name="user.attributes.interests"
            :value="$user->attributes->interests"
            event="fff"
        />

        <x-lk::ui.form.inputText
            title="{{ __('profile-additional-about') }}"
            name="user.attributes.about"
            :value="$user->attributes->about"
        />

        <x-lk::ui.form.inputText
            title="{{ __('profile-telegram') }}"
            name="user.attributes.telegram"
            :value="$user->attributes->telegram"
        />

        <x-lk::ui.form.inputText
            title="{{ __('profile-instagram') }}"
            name="user.attributes.instagram"
            :value="$user->attributes->instagram"
        />

        <x-lk::ui.form.inputText
            title="{{ __('profile-facebook') }}"
            name="user.attributes.facebook"
            :value="$user->attributes->facebook"
        />

        <x-lk::ui.form.inputText
            title="{{ __('profile-vkontakte') }}"
            name="user.attributes.vkontakte"
            :value="$user->attributes->vkontakte"
        />

        <button type="submit" class="accent">{{ __('profile-btn-save') }}</button>

    </form>

</div>
