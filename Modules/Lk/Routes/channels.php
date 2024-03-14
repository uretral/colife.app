<?php

use Modules\Lk\Broadcasting\AppealChannel;
use Modules\Lk\Broadcasting\ChatChannel;
use Modules\Lk\Broadcasting\TenantChannel;
use Illuminate\Support\Facades\Broadcast;

// Пользовательские уведомления
Broadcast::channel('tenants.{id}', TenantChannel::class);
// Чаты
Broadcast::channel('chats.{chatId}', ChatChannel::class);
// Обращения
Broadcast::channel('appeals.{appealId}', AppealChannel::class);
