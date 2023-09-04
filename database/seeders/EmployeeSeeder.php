<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'first_name' => 'Task',
            'last_name' => 'syarat',
            'email' => 'task@syarat.com',
            'phone' => '1234567890',
            'salary' => 50000,
            'image' => null,
            'password' => 'S3cureP@ssw0rd',
            'manager_id' => null,
            'department_id' => Department::first()?->id,
            'created_at' => now(),
        ]);
    }
}
