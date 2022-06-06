<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Repositories\EventUserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property EventUser $model
 *
 * @method EventUser|null find(int $id)
 * @method EventUser[]|Collection all()
 * @method EventUser create(array $attributes)
 * @method EventUser updateOrCreate(array $attributes)
 * @method Builder newQuery()
 */
class EventUserRepository extends BaseRepository implements EventUserRepositoryInterface
{
    public function __construct(EventUser $model)
    {
        parent::__construct($model);
    }

    public function getByUserAndEvent(User $user, Event $event): ?EventUser
    {
        return $this->model
            ->where('fk_id_user', $user->id_user)
            ->where('fk_id_event', $event->id_event)
            ->first();
    }
}
