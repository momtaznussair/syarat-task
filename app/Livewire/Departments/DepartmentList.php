<?php

namespace App\Livewire\Departments;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Common\Delete;
use Livewire\Attributes\Computed;
use App\Services\DepartmentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentList extends Component
{
    use WithPagination, AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';
    public $department;
    protected $departmentService;

    public $search;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

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

    public function confirmDelete($department) {
        $this->department = $department;
        $this->dispatch('confirmDeletion', $department)->to(Delete::class);
    }

    public function update($department) {
        $this->dispatch('updateDepartment', $department)->to(EditDepartment::class);
    }


    #[On("delete")]
    public function destory($departmentId, DepartmentService $departmentService) {
        try {
            $this->authorize('delete', $departmentService->find($departmentId));
            $departmentService->delete($departmentId);
            $this->dispatch('deleted', $this->department['name'])->to(Delete::class);
            $this->reset('department');
        } catch (AuthorizationException $e) {
            $this->dispatch('toastError', ['message' => $e->getMessage()]);
        }
        catch (\Exception $e) {
            $this->dispatch('toastError');
        }
    }
}
