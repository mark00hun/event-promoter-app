<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function find(int $id): ?Model;

    public function all(): Collection;

    public function create(array $attributes): Model;

    public function newQuery(): Builder;
}
