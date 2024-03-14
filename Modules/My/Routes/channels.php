<?php

use Modules\My\Broadcasting\MyChannel;
use Modules\My\Broadcasting\RequestChannel;
use Modules\My\Broadcasting\AppealChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('my.users.{id}', MyChannel::class);
Broadcast::channel('my.request.{chatId}', RequestChannel::class);
Broadcast::channel('my.appeals.{appealId}', AppealChannel::class);
