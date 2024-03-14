<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifier extends Component
{
    // common
    public bool $active = false;
    public string $type = ''; // warn , error , success
    public string $header = '';
    public string $body = '';

    // onConfirm
    public string $acceptBtnText = 'Сохранить';
    public string $acceptEvent = 'onAccept';
    public string $denyBtnText = 'Отказаться';
    public string $denyEvent = 'onDeny';

    // auto close
    public int $timeout = 0;

    public function updatedActive()
    {
        $this->type = '';
        $this->header = '';
        $this->body = '';
        $this->acceptBtnText = 'Сохранить';
        $this->acceptEvent = 'onAccept';
        $this->denyBtnText = 'Отказаться';
        $this->denyEvent = 'onDeny';
        $this->timeout = 0;
    }

/*    protected $listeners = [
        'onNotify',
        'onConfirm',
        'onError',
    ];*/


    public function emitAcceptEvent($payload = null)
    {
        $this->dispatch($this->acceptEvent, $payload);
    }

    public function emitDenyEvent($payload = null)
    {
        $this->dispatch($this->denyEvent, $payload);
    }

    #[On('onNotify')]
    public function onNotify($header = '', $body = '', $timeout = 2000)
    {

        $this->type = 'success';
        $this->header = $header;
        $this->body = $body;
        $this->timeout = $timeout;
        $this->active = true;
    }

    #[On('onConfirm')]
    public function onConfirm($payload)
    {
        $this->type = 'warn';
        $this->header = $payload['header'];
        !array_key_exists('body', $payload) ?: $this->body = $payload['body'];
        !array_key_exists('acceptBtnText', $payload) ?: $this->acceptBtnText = $payload['acceptBtnText'];
        !array_key_exists('denyBtnText', $payload) ?: $this->denyBtnText = $payload['denyBtnText'];
        !array_key_exists('acceptEvent', $payload) ?: $this->acceptEvent = $payload['acceptEvent'];
        !array_key_exists('denyEvent', $payload) ?: $this->denyEvent = $payload['denyEvent'];
        $this->active = true;
    }

    #[On('onError')]
    public function onError($payload)
    {
        $this->type = 'error';
        $this->header = $payload['header'];
        !array_key_exists('body', $payload) ?: $this->body = $payload['body'];
        $this->timeout = array_key_exists('timeout', $payload) ? $payload['timeout'] : 3000;
        $this->active = true;
    }

    public function render(): View
    {
        return view('my::livewire.notifier');
    }
}
