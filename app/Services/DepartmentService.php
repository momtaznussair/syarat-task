<?php

namespace App\Services;

use App\Repositories\Contracts\DepartmentRepositoryInterface;
use App\Traits\HasRepository;

class DepartmentService
{
    use HasRepository;
    public function __construct(protected DepartmentRepositoryInterface $repository) {
        //
    }
}