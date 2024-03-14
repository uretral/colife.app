<?php

namespace Modules\My\Events;


class ProfilePhoneEvent extends MyEvent
{
    public string $phone;
    public mixed $phone_old;

    public function __construct($userId, $phone, $phone_old)
    {
        parent::__construct($userId);
        $this->phone = $phone;
        $this->phone_old = $phone_old;
    }
}
