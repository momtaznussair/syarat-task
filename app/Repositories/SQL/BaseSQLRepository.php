<?php

namespace App\Repositories\SQL;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseSQLRepository implements RepositoryInterface
{
    public function __construct(protected Model $model){}

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
    public function get(
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

        //select attributes
        $query->select($selectAttributes);
        // Return either a paginator or a collection based on the value of $paginate.
        return $paginate ? $query->paginate($paginate) : $query->get();
    }

    /**
     * Get a collection of all models with optional attributes and relations.
     *
     * @param array $selectAttributes
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $selectAttributes = ['*'], array $relations = []): Collection
    {
        return $this->model
            ->select($selectAttributes)
            ->with($relations)
            ->get();
    }

    /**
     * Find a model by ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Create a new model with the given attributes.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Update the model with the given ID and attributes.
     *
     * @param int $id
     * @param array $attributes
     * @return Model
     */
    public function update(int $id, array $attributes): Model
    {
        $record = $this->find($id);
        $record->update($attributes);
        return $record;
    }

     /**
     * Delete the model with the given ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model =  $this->find($id);
        return $model->delete();
    }
}
