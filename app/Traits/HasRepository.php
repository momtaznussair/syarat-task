<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
trait HasRepository
{
    public function get(array $attributes = ['*'], array $filters = [], array $relations = [], int|null $paginate = 15) : LengthAwarePaginator {
        return $this->repository->get($attributes, $filters, $relations, $paginate);
    }

    public function all(array $attributes = ['*'], array $relations = []) : Collection {
        return $this->repository->all($attributes, $relations);
    }

    public function find(int $id) {
        return $this->repository->find($id);
    }

    public function create(array $attributes){
        return $this->repository->create($attributes);
    }

    public function update(int $id, array $attributes){
        return $this->repository->update($id, $attributes);
    }

    public function delete(int $id){
        return $this->repository->delete($id);
    }

    public function getForSelection() {
        return $this->repository->all(['id', 'name']);
    }
}