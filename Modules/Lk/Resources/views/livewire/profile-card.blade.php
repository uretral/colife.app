<div class="profile-card">
    <div class="loading" wire:loading.class="active"></div>
    <x-lk::ui.block.user-badge
        :name="@$profileCardUser->name"
        :surname="@$profileCardUser->surname"
        :date="@$profileCardUser->date"
        :avatar="@$profileCardUser->tmpImage ? $profileCardUser->tmpImage->temporaryUrl() : $profileCardUser->avatar "
    />

    <x-lk::ui.block.label title="{{ __('profile-email') }}" :value="@$profileCardUser->email"/>

    <x-lk::ui.block.label title="{{ __('profile-phone') }}" :value="\App\Helpers\BladeHelper::phoneFormat(@$profileCardUser->phone)"/>

    @if(@$profileCardUser->country_code == 'ru')
        <div class="profile-bonus">

            <div class="profile-bonus-link">
                <b>{{\App\Helpers\BladeHelper::bonusFormat(@$profileCardUser->attributes->bonus)}}</b>
                <a href="{{route('lk.bonus')}}" @click="Livewire.dispatch('onBonusBtnClicked')"></a>
            </div>
            <div class="profile-bonus-info">
                <span>1 {{ __('profile-bonus') }} = 1{{ __('profile-money-format') }}</span>
            </div>
        </div>

    @else
        <hr/>
    @endif


    <button type="button" class="change-password" wire:click="profileCardPasswordAction('open')">{{ __('profile-btn-password-change') }}</button>

    <button type="button" class="remove-profile"  wire:click="profileCardDeleteAction('open')">{{ __('profile-btn-profile-delete') }}</button>

    <x-lk::ui.frame.modal title="{{ __('profile-modal-password-change-title') }}" event="onChangePass">
        <form wire:submit.prevent="profileCardPasswordAction('submit')">

            <fieldset class="profile-changePassword">

                <x-lk::ui.form.inputPassword
                    title="{{ __('profile-label-password-current') }}"
                    name="profileCardPassword.password"
                    :value="$profileCardPassword->password"

                />

                <x-lk::ui.form.inputPassword
                    title="{{ __('profile-label-password-new') }}"
                    name="profileCardPassword.newPassword"
                    :value="$profileCardPassword->newPassword"
                    hint="{{ __('profile-hint-password') }}"
                />

                <button type="submit" class="accent">{{ __('profile-btn-save') }}</button>

            </fieldset>
        </form>
    </x-lk::ui.frame.modal>

    <x-lk::ui.frame.modal title="{{ __('profile-delete-confirmation') }}" event="onDeleteProfile">
        <form wire:submit.prevent="profileCardDeleteAction('delete')">
            <fieldset class="profile-deleteProfile">

                <x-lk::ui.form.radio-buttons
                    title="{{ __('profile-delete-reason') }}"
                    :options="$profileCardDelete->reasons()"
                    name="profileCardDelete.reason"
                    :value="$profileCardDelete->reason"
                />

                @if((int)$profileCardDelete->reason === (int)$profileCardDelete->reasonOther)
                    <x-lk::ui.form.inputText
                        title="{{ __('profile-delete-reason-title') }}"
                        name="profileCardDelete.reasonText"
                        :value="$profileCardDelete->reasonText"
                    />
                @endif


                <button class="accent" type="button"
                        wire:click="profileCardDeleteAction('close')">{{ __('profile-btn-delete-reject') }}</button>
                <button class="fancy" type="submit">{{ __('profile-btn-delete-accept') }}</button>

            </fieldset>
        </form>
    </x-lk::ui.frame.modal>

</div>

