<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property User $model
 *
 * @method User|null find(int $id)
 * @method User[]|Collection all()
 * @method User create(array $attributes)
 * @method User updateOrCreate(array $attributes)
 * @method Builder newQuery()
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
