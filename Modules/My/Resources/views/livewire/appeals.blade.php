<div class="appeal-body" >

    <div class="appeal-menu">
        <div class="appeal-menu-header">
            <x-my::form.search/>
        </div>
        <div class="appeal-menu-body">
            @foreach($appeals as $appeal)
                <x-my::block.appeal-menu-item :appeal="@$appeal" :currentId="@$activeAppeal?->id"/>
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
                    <x-my::block.badge-avatar :user="$user"/>
                @endforeach

                <span>{{ @count($activeAppeal->users)}} {{ __('appeal-participant') }}</span>

            </div>
            @endif
        </div>

        <div class="appeal-frame-body" x-data>

            <div class="appeal-wrapper" x-ref="wrapper">
                <div class="appeal-content">

                    @foreach(@$messages as $message)
                        <div
                            class="@if($message->author_id === $this->userId) appeal-item-out @else appeal-item-in @endif">
                            @if($message->author_id !== $this->userId)
                                <x-my::block.badge-short :user="$this->getUserData($message->author_id)"/>
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

                            @if(@!empty($message->message))
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
                            <x-my::block.scoring
                                :value="$this->activeAppeal->score ?? $this->ratingForm->rating"
                                score="ratingForm.rating"
                                comment="ratingForm.comment"
                            />
                    @endif
                </div>
            </div>

            @if(@!$finished)

                <div class="chat-tg"
                     x-data="{ txt: @entangle('txt'), activeAppealId: @entangle('activeAppeal.id'), isUploading: false, progress: 0 }"
                     x-on:livewire-upload-start="isUploading = true"
                     x-on:livewire-upload-finish="isUploading = false"
                     x-on:livewire-upload-error="isUploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <form wire:submit.prevent="saveAppeal">
                        @if(!empty($files))
                            <div class="upload-filename " >
                                @foreach($files as $filename)
                                    <span class="pointer" wire:click="clearFile">
                                    <b>{{ @$filename->getClientOriginalName() }}</b>
                                </span>
                                @endforeach
                            </div>
                        @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>

                            <x-my::form.inputDiv
                                :placeholder="__('appeal-message')"
                                :name="$txt"
                                method="saveAppeal" />
                            <label>
                                <input type="file" multiple wire:model="files" name="files"/>
                            </label>
                            <button type="button" class="send" @click="$wire.saveAppeal(txt)"></button>
                    </form>
                </div>

            @endif

        </div>

    </div>
</div>
