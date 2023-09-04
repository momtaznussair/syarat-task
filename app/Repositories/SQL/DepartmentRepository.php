<?php

namespace App\Repositories\SQL;

use App\Models\Department;
use App\Repositories\Contracts\DepartmentRepositoryInterface;
use App\Repositories\SQL\BaseSQLRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository extends BaseSQLRepository implements DepartmentRepositoryInterface
{
    public function __construct(Department $model) {
        $this->model = $model;
    }

    /**
     * Get a collection of models with optional filters, relations, and pagination.
     *
     * @param array $selectAttributes
     * @param array $filters
     * @param array $relations
     * @param int|null $paginate
     * @param array $orderBy
     * @return \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function list(
        array $selectAttributes = ['*'],
        array $filters = [],
        array $relations = [],
        int|null $paginate = 15,
        array $orderBy = []
    ): LengthAwarePaginator|Collection {
        $query = $this->model->query();

        // applying filters
        foreach ($filters as $filter => $value) {
            if(in_array($filter, $this->model::filters())) {
                $query->{$filter}($value);
            }
        }

        // sort results
         foreach ($orderBy as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        // loading relations
        $query->with($relations);

        $query->select($selectAttributes);

        $query->withCount(['employees']);

        $query->withSum('employees', 'salary');
        
        // Return either a paginator or a collection based on the value of $paginate.
        return $paginate ? $query->paginate($paginate) : $query->get();
    }
}