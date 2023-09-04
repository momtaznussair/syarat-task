<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employees() {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function manager() {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

   /** Define an accessor for the full_name attribute **/
   public function getFullNameAttribute()
   {
       return $this->first_name . ' ' . $this->last_name;
   }

}
