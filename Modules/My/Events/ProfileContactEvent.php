<?php

namespace Modules\My\Events;


class ProfileContactEvent extends MyEvent
{
    public array $contact;

    public function __construct($userId, $contact)
    {
        parent::__construct($userId);
        $this->contact = $contact;
    }
}
