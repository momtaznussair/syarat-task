<?php

namespace App\Livewire\Departments;

use Livewire\Component;
use App\Services\DepartmentService;
use Illuminate\Validation\ValidationException;

class CreateDepartment extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.departments.create-department');
    }

    protected $rules = [
        'name' => 'required|string|min:6|max:255',
    ];


    public function save(DepartmentService $departmentService)
    {
        try {
            $attributes = $this->validate();
            
            $departmentService->create($attributes);
            $this->dispatch('toastSuccess', ['message' => 'Department Create successfully!']);
            $this->dispatch('hideModal');
            $this->reset();
        } 
        catch (ValidationException $e) {
            $this->dispatch('toastError', ['message' => $e->getMessage()]);
        }
        catch (\Exception $e) {
            $this->dispatch('toastError');
        }
        
    }

    
}
