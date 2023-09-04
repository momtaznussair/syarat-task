<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    protected function filters(): array {
        return ['search'];
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeSearch(Builder $query, $keyword): void
    {
        $query->where('name', 'LIKE', "%$keyword%");
    }
}
