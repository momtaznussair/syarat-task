<?php

namespace App\Services;

use App\Repositories\Contracts\DepartmentRepositoryInterface;
use App\Traits\HasRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DepartmentService
{
    use HasRepository;
    public function __construct(protected DepartmentRepositoryInterface $repository) {
        //
    }

    public function list(array $attributes = ['*'], array $filters = [], array $relations = [], int|null $paginate = 15) : LengthAwarePaginator {
        return $this->repository->list($attributes, $filters, $relations, $paginate);
    }
}