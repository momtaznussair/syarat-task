<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'employee_id'];



    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

     /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => TaskStatusEnum::Pending,
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
