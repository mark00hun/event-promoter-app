<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\User;

interface EventUserRepositoryInterface
{
    public function getByUserAndEvent(User $user, Event $event);
}
