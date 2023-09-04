<?php

namespace App\Livewire\Departments;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Common\Delete;
use App\Services\DepartmentService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DepartmentList extends Component
{
    use WithPagination, AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';
    public $department;
    protected $departmentService;

    public $search;

    public function render(DepartmentService $departmentService)
    {
        return view('livewire.departments.department-list', [
            'departments' => $departmentService->list(
                ['id', 'name', 'created_at'],
                $this->search ? ['search' => $this->search] : [],
            ),
            'pageTitle' => trans('Departments')
        ]);
    }

    public function updatedDepartment() {
        $this->department && $this->dispatch('confirmDeletion', $this->department)->to(Delete::class);
    }


    #[On("delete")]
    public function destory($departmentId, DepartmentService $departmentService) {
        try {
            $this->authorize('delete', $departmentService->find($departmentId));
            $departmentService->delete($departmentId);
            $this->dispatch('deleted', $this->department['name'])->to(Delete::class);
            $this->reset('department');
        } catch (\Exception $e) {
            $this->dispatch('toastError', ['message' => $e->getMessage()]);
        }
    }
}
