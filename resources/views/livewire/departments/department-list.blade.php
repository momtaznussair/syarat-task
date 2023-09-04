<div>
    <x-layouts.page-title :text="$pageTitle"/>
  
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input wire:model.live='search' type="text"
                        class="form-control form-control-solid w-250px ps-12"
                        placeholder="{{ __('Search Departments  ') }}" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">{{ __('Add Department') }}</button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5 m-auto" id="kt_customers_table">
                <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">{{ __('Name') }}</th>
                        <th class="min-w-125px">{{ __('Number Of Employees') }}</th>
                        <th class="min-w-125px">{{ __('Sum Of Employees Salary') }}</th>
                        <th class="min-w-125px">{{ __('Created Date') }}</th>
                        <th class="min-w-70px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse ($departments as $department)
                    <tr wire:ignore class="text-center" wire:key="{{ $department->id }}">
                        <td> {{ $department->name }} </td>
                        <td> {{ $department->employees_count == 0 ? 'N/A' : $department->employees_count }} </td>
                        <td>{{ $department->employees_sum_salary ? moneyFormat($department->employees_sum_salary) : 'N/A' }}</td>

                        <td>{{ $department->created_at?->toFormattedDateString() }}</td>
                        <td>
                            <span  wire:click="confirmDelete({{ $department }})" title="delete"> <i class="fa fa-trash text-danger fs-5 p-5" aria-hidden="true" ></i> </span>
                            <span title="edit"> <i class="fa fa-pencil text-primary fs-5 p-5" aria-hidden="true" ></i> </span>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">No Results Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $departments->links() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @livewire('common.delete')
    <!--end::Card-->
</div>
