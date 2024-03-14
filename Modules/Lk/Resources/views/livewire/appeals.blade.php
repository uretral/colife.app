<div class="appeal-body" >
    <div class="appeal-menu">
        <div class="appeal-menu-header">
            <x-lk::ui.form.search/>
        </div>
        <div class="appeal-menu-body">
            @foreach($appeals as $appeal)
                <x-lk::ui.block.appeal-menu-item :appeal="@$appeal" :currentId="@$activeAppeal?->id"/>
            @endforeach
        </div>

    </div>
    <div class="appeal-frame">
        <div class="appeal-frame-header">
            <a  href="javascript:" @click="hideChatFrame()"></a>
            <div class="appeal-frame-title">
                @if(@$activeAppeal->themeType)
                    <span>{{@$activeAppeal->theme->content->title}}, {{@$activeAppeal->themeType->content->title}}</span>
                @else
                    <span>{{@$activeAppeal->theme->content->title}}</span>
                @endif
            </div>

            @if($activeAppeal?->users)
            <div class="appeal-frame-participants">
                @foreach($activeAppeal->users as $user)
                    <x-lk::ui.block.badge-avatar :user="$user"/>
                @endforeach

                <span>{{ @count($activeAppeal->users)}} {{ __('appeal-participant') }}</span>

            </div>
            @endif
        </div>

        <div class="appeal-frame-body" x-data>

            <div class="appeal-wrapper" x-ref="wrapper">
                <div class="appeal-content">

                    @foreach(@$appealMessages as $message)
                        <div
                            class="@if($message->author_id === $this->userId) appeal-item-out @else appeal-item-in @endif">
                            @if($message->author_id !== $this->userId && $message->message !== '#appeal_rate')
                                <x-lk::ui.block.badge-short :user="$this->getUserData($message->author_id)"/>
                            @endif

                            @if(@count($message->files))
                                <div class="appeal-item-files">
                                    @foreach($message->files as $file)
                                        <div class="appeal-item-file">
                                            <a target="_blank" href="{{\Storage::url("$file->path")}}">{{ __('appeal-filename') . ": ". $file->filename }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if(@!empty($message->message) && $message->message !== '#appeal_rate')
                                <div class="appeal-item-text">
                                    <div class="appeal-item-message">
                                            {{$message->message}}
                                    </div>
                                    <div
                                        class="appeal-item-date">{{ \Carbon\Carbon::parse($message->created_at)->format('h:i') }}</div>
                                    @if($message->author_id === $this->userId)
                                        <div class="appeal-item-read"></div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach

                    @if(@$finished)
                            <x-lk::ui.block.scoring :value="$this->score"/>
                    @endif
                </div>
            </div>

            @if(@!$finished)

                <div class="chat-tg" x-data="{ txt: @entangle('txt'), activeAppealId: @entangle('activeAppeal.id'), isUploading: false, progress: 0 }"
                     x-on:livewire-upload-start="isUploading = true"
                     x-on:livewire-upload-finish="isUploading = false"
                     x-on:livewire-upload-error="isUploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <form wire:submit.prevent="saveAppeal">
                        @if(!array_key_exists('files', $errors->getMessages()))
                            <div class="upload-filename " >
                                @foreach($files as $filename)
                                    <span class="poiner" wire:click="clearFile">
                                    <b>{{ @$filename->getClientOriginalName() }}</b>
                                </span>
                                @endforeach
                            </div>
                        @endif
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>

                            <x-lk::ui.form.inputDiv
                                :placeholder="__('appeal-message')"
                                :name="$txt"
                                method="saveAppeal" />

                            @error('txt')
                            <x-lk::ui.form.dispatch-notifier
                                header="{{__('notifier.error.header')}}"
                                timeout="10000"
                                :body="$message"
                            />
                            @enderror

                        <label>
                            <input type="file" multiple wire:model.defer="files" name="files"/>
                            @error('files')
                            <x-lk::ui.form.dispatch-notifier
                                header="{{__('notifier.error.header')}}"
                                timeout="10000"
                                :body="$message"
                            />
                            @enderror
                            @error('files.*')
                            <x-lk::ui.form.dispatch-notifier
                                header="{{__('notifier.error.header')}}"
                                timeout="10000"
                                :body="$message"
                            />
                            @php $this->resetErrorBag() @endphp
                            @enderror
                        </label>
                        <button type="button" class="send" @click="$wire.saveAppeal(txt)"></button>
                    </form>
                </div>

            @endif

        </div>

    </div>
</div>
