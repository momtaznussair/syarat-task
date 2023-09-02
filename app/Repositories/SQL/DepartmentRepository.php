<?php

namespace App\Repositories\SQL;

use App\Models\Department;
use App\Repositories\Contracts\DepartmentRepositoryInterface;
use App\Repositories\SQL\BaseSQLRepository;

class DepartmentRepository extends BaseSQLRepository implements DepartmentRepositoryInterface
{
    public function __construct(Department $model) {
        $this->model = $model;
    }
}