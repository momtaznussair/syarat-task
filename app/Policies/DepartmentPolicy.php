<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
    public function delete(Employee $employee, Department $department)
    { 
        return $department->employees->isEmpty()
        ? Response::allow()
        : Response::deny("Can't delete department with employees.");
    }
}
