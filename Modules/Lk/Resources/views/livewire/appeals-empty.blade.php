<div class="appeal-body empty">
    <div class="appeal-empty">
        <img src="{{ vite::asset('resources/img/icons/appeals-empty.svg') }}" alt="icon"/>
        <b>{{ __('appeal-empty-title') }}</b>
        <span>{{ __('appeal-empty-text') }}</span>

        <button class="accent icon-plus" type="button" wire:click="onCustomEvent('modal')">{{ __('appeal-btn-create') }}</button>
    </div>
</div>
