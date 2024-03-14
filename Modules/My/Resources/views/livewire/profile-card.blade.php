<div class="profile-card">

    <div class="badge">
        <div class="badge-avatar">
            <input type="file" name="avatar" id="imgSelect" wire:model="profileCardUser.tmpImage"/>
            <label for="imgSelect" @click="Livewire.dispatch('onChangeAvatarImage', {page :'{{request()->path()}}'})">
                @if($profileCardUser->tmpImage)
                    <img src="{{$profileCardUser->tmpImage->temporaryUrl()}}" alt="{{$profileCardUser->name}}"/>
                @else
                    <img src="{{$profileCardUser->avatar}}" alt="{{$profileCardUser->name}}"/>
                @endif
            </label>
        </div>

        <div class="badge-content">
            <div class="badge-title" x-text="truncateTitle( @js(@$profileCardUser->name) )"></div>
            <div class="badge-title" x-text="truncateTitle( @js(@$profileCardUser->surname) )"></div>
            <div class="badge-data">{{ @$profileCardUser->email}}</div>
            <div class="badge-date">{{ @$profileCardUser->date}}</div>
        </div>
    </div>

    <x-my::block.label title="{{__('profile-email')}}" :value="@$profileCardUser->email"/>
    <x-my::block.label title="{{__('profile-phone')}}"
                       :value="\App\Helpers\BladeHelper::phoneFormat(@$profileCardUser->phone)"/>

    <hr class="profile-card-hr"/>

    <button type="button" class="change-password"
            wire:click="profileCardPasswordAction('open')">{{__('profile-btn-password-change')}}</button>
    <button type="button" class="remove-profile"
            wire:click="profileCardDeleteAction('open')">{{__('profile-btn-profile-delete')}}</button>

    <x-my::frame.modal title="{{__('profile-modal-password-change-title')}}" event="onChangePass">
        <form wire:submit.prevent="profileCardPasswordAction('submit')">
            <fieldset class="profile-changePassword">

                <x-my::form.inputPassword
                    title="{{__('profile-label-password-current')}}"
                    name="profileCardPassword.password"
                    :value="$profileCardPassword->password"

                />

                <x-my::form.inputPassword
                    title="{{__('profile-label-password-new')}}"
                    name="profileCardPassword.newPassword"
                    :value="$profileCardPassword->newPassword"
                    hint="{{__('profile-hint-password')}}"
                />

                <button type="submit" class="accent">{{__('profile-btn-save')}}</button>

            </fieldset>
        </form>
    </x-my::frame.modal>

    <x-my::frame.modal title="{{__('profile-delete-confirmation')}}" event="onDeleteProfile">
        <form wire:submit.prevent="profileCardDeleteAction('delete')">

            <fieldset class="profile-deleteProfile">
                <x-my::form.radio-buttons
                    title="{{__('profile-delete-reason')}}"
                    :options="$profileCardDelete->reasons()"
                    name="profileCardDelete.reason"
                    :value="$profileCardDelete->reason"
                />

                @if((int)$profileCardDelete->reason === (int)$profileCardDelete->reasonOther)
                    <x-my::form.inputText
                        title="{{__('profile-delete-reason-title')}}"
                        name="profileCardDelete.reasonText"
                        :value="$profileCardDelete->reasonText"
                    />
                @endif


                <button class="accent" type="button"
                        wire:click="profileCardDeleteAction('close')">{{__('profile-btn-delete-reject')}}</button>
                <button class="fancy" type="submit">{{__('profile-btn-delete-accept')}}</button>

            </fieldset>
        </form>
    </x-my::frame.modal>

</div>

