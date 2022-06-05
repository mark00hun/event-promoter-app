<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property Event $model
 *
 * @method Event|null find(int $id)
 * @method Event[]|Collection all()
 * @method Event create(array $attributes)
 * @method Builder newQuery()
 */
class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }
}
