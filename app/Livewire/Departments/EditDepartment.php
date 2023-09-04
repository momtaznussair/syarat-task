<?php

namespace App\Livewire\Departments;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\DepartmentService;
use Illuminate\Validation\ValidationException;

class EditDepartment extends Component
{
    public $name;
    public $id;

    public function render()
    {
        return view('livewire.departments.edit-department');
    }

    protected $rules = [
        'name' => 'required|string|min:6|max:255',
    ];

    #[On("updateDepartment")]
    public function update($department) {
       $this->id = $department['id'];
       $this->name = $department['name'];
    }

    public function save(DepartmentService $departmentService)
    {
        try {
            $attributes = $this->validate();
            
            $departmentService->update($this->id, $attributes);
            $this->dispatch('toastSuccess', ['message' => 'Department Updated successfully!']);
            $this->dispatch('hideModal');
            $this->redirectRoute('departments.list');
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
