<div class="profile-info">
    <h2>{{ __('profile-additional-info') }}</h2>

    {{--additionalPhoneForm--}}
    <div class="profile-info-data">

        @if(@$additionalPhoneForm->phone_sub && !$additionalPhoneForm->editing)

            <p>{{ __('profile-additional-phone') }}<b>{{@$additionalPhoneForm->phone_sub}}</b></p>
            <button type="submit" class="accent editing"
                    wire:click="additionalPhone('edit')">{{ __('profile-additional-edit-btn') }}
            </button>

        @elseif($additionalPhoneForm->editing)

            <form class="profile-update-phone_sub" wire:submit="additionalPhone('save')">
                <x-my::form.inputPhone
                    title="{{ __('profile-additional-phone') }}"
                    name="additionalPhoneForm.phone_sub"
                />
                <button type="submit" class="accent save">{{ __('profile-additional-update-btn') }}</button>
                <button type="button" class="unnoticed cancel"
                        wire:click="additionalPhone('cancel')">{{ __('profile-additional-cancel-btn') }}
                </button>
            </form>

        @else

            <p>
                <span>{{ __('profile-additional-phone') }}</span>
                <button class="add full"
                        wire:click="additionalPhone('edit')">{{ __('profile-additional-add-btn') }}</button>
            </p>

        @endif
    </div>

    {{--additionalContact--}}
    <div class="profile-info-data" x-data="{active: false}" x-on:close-form.window="active = false">
        <h2>{{ __('profile-additional-contact') }}</h2>

        @if(!empty($contactForm?->name) && !empty($contactForm?->phone) && !$contactForm->editing)
            <div class="profile-info-contact">
                <p>{{ __('profile-additional-fio-title') }}<b>{{@$contactForm?->name}}</b></p>
                <p>{{ __('profile-additional-phone-title') }}<b>{{@$contactForm?->phone}}</b></p>
            </div>
            <button x-show="!active" wire:click="additionalContact('edit')"
                    class="accent editing">{{ __('profile-additional-edit-btn') }}
            </button>

        @elseif($contactForm->editing)

            <form wire:submit="additionalContact('update')">
                <x-my::form.inputText
                    title="{{ __('profile-additional-fio-title') }}"
                    placeholder="{{ __('profile-additional-contact-placeholder') }}"
                    name="contactForm.name"
                />
                <x-my::form.inputPhone
                    title="{{ __('profile-additional-phone-title') }}"
                    name="contactForm.phone"
                />
                <button type="submit" class="accent save">
                    {{ __('profile-additional-save-btn') }}
                </button>
            </form>

        @else
            <p>
                <span>{{ __('profile-additional-contact') }}</span>
                <button type="button" class="add full"
                        wire:click="additionalContact('edit')">{{ __('profile-additional-add-btn') }}
                </button>
            </p>
        @endif

        @if($contactForm->editing)
            <button type="button" class="unnoticed cancel"
                    wire:click="additionalContact('cancel')">{{ __('profile-additional-cancel-btn') }}
            </button>
        @endif

    </div>


</div>
