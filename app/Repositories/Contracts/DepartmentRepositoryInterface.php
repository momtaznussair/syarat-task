<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DepartmentRepositoryInterface extends RepositoryInterface{
    public function list(array $attributes = ['*'], array $filters = [], array $relations = [], int|null $paginate = 15, array $orderBy = []): LengthAwarePaginator|Collection;
}