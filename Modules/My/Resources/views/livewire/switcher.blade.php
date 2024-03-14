<div class="content-header" :class="{active: !showChat}" x-data="dd(@js($this))">
    <x-my::block.switcher-menu :data="$switcherMenu" :active="$this->current" />
    <button class="accent icon-plus @if(app()->getLocale() != 'ru') no-wrap @endif" type="button" wire:click="onAppealModal">{{ __('support.create_appeal') }}</button>
</div>
