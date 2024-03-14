<?php

namespace Modules\Lk\Data\Notifications;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class PasswordNotification extends Data
{
    public function __construct(
        public string $header = 'Изменение пароля',
        public string $body = '',
        public string $type = 'success',
        public string $event = 'onError',
        public int $timeout = 5000,
    ) {
        $this->setBody();
        $this->setEvent();
    }
    public function setBody(){
        return match ($this->type) {
            "success" => $this->body = "Успешное изменение пароля!",
            "onConfirm" => $this->body = "Подтвердите изменение пароля!",
            default => $this->body = "Ошибка изменения пароля, предыдущий пароль введен неверно!",
        };
    }
    public function setEvent(){
        return match ($this->type) {
            "success" => $this->event = "onNotify",
            "confirm" => $this->event = "onConfirm",
            default => $this->event = "onError",
        };
    }
}
