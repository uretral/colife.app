<div class="chat-body" x-data="dd(@js($this))">

    <div class="chat-menu">
        @foreach($this->chatListForm->chats() as $chat)
            <x-lk::ui.block.chat-menu-item :chat="$chat" :active="$this->chatListForm->chat()->id"/>
        @endforeach
    </div>
    <div class="chat-frame">
        @if($this->chatListForm->chat())
            <x-lk::ui.block.chat-frame-header :chat="$this->chatListForm->chat()"/>
        @endif

            <div class="chat-frame-body" x-data>

                <div class="chat-wrapper" x-ref="wrapper">
                    <div class="chat-content">
                        @foreach($this->chatListForm->chat()->messages as $message)
                            <x-lk::ui.block.chat-message :message="$message" :userId="$this->chatListForm->userId"/>
                        @endforeach
                    </div>
                </div>

                <div class="chat-tg"
                     x-data="{
                         txt: @entangle('createMessageForm.txt'),
                         activeChatId: @entangle('chatListForm.id'),
                         files: @entangle('createMessageForm.files'),
                         isUploading: false,
                         progress: 0
                     }"
                     x-on:livewire-upload-start="isUploading = true"
                     x-on:livewire-upload-finish="isUploading = false"
                     x-on:livewire-upload-error="isUploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <form wire:submit.prevent="onMessageSubmit">

                        @if(!empty($createMessageForm->files))
                            <div class="upload-filename ">
                                @foreach($createMessageForm->files as $filename)
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
                            :placeholder="__('chat-message')"
                            :name="$createMessageForm->txt"
                            method="onMessageSubmit"></x-lk::ui.form.inputDiv>
                        @error('txt')
                        <x-lk::ui.form.dispatch-notifier
                            header="{{__('notifier.error.header')}}"
                            timeout="10000"
                            :body="$message"
                        />
                        @enderror
                        <label>
                            <input type="file" multiple wire:model="createMessageForm.files" name="createMessageForm.files"/>

                            @error('createMessageForm.files')
                            <x-lk::ui.form.dispatch-notifier
                                header="{{__('notifier.error.header')}}"
                                timeout="10000"
                                :body="$message"
                            />
                            @enderror

                            @error('createMessageForm.files.*')
                            <x-lk::ui.form.dispatch-notifier
                                header="{{__('notifier.error.header')}}"
                                timeout="10000"
                                :body="$message"
                            />
                            @php $this->resetErrorBag() @endphp
                            @enderror

                        </label>
                        <button type="button" class="send" @click="$wire.onMessageSubmit(txt)"></button>

                    </form>
                </div>

            </div>

    </div>

</div>



