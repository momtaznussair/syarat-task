<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RepositoryInterface{
    public function get(array $attributes = ['*'], array $filters = [], array $relations = [], int|null $paginate = 15, array $orderBy): LengthAwarePaginator|Collection;
    public function all(array $attributes = ['*'], array $relations = []) : Collection;
    public function find(int $id);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function delete(int $id);
}