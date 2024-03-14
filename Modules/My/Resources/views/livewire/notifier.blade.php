
    <div class="notifier {{$this->type}} " :class="{active}" x-data="notifier(@entangle('active'), @entangle('timeout'))">
        @if($this->type !== 'warn')
            <button type="button" @click="close()" class="notifier-close"></button>
        @endif
        @if($this->header)
            <div class="notifier-header">
                {{$this->header}}
            </div>
        @endif
        @if($this->body)
            <div class="notifier-body">
                {{$this->body}}
            </div>
        @endif
        @if($this->type === 'warn')
            <div class="notifier-footer">
                <button class="accept">{{$this->acceptBtnText}}</button>
                <button class="deny">{{$this->denyBtnText}}</button>
            </div>
        @endif
    </div>


