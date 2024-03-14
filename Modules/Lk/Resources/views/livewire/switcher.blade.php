<div class="content-header" :class="{active: !showChat}">
    <x-lk::ui.block.switcher-menu :data="$this->switcherMenu()" :active="$this->switcherMenuId"/>
    <button class="accent icon-plus" type="button" wire:click="$dispatch('onOpenAppealForm',{open: true})" >{{ __('support.create_appeal') }}</button>
</div>
