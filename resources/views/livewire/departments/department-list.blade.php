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
                    <tr class="text-center" wire:key="{{ $department->id }}">
                        <td> {{ $department->name }} </td>
                        <td> {{ $department->employees_count == 0 ? 'N/A' : $department->employees_count }} </td>
                        <td>{{ $department->employees_sum_salary ? moneyFormat($department->employees_sum_salary) : 'N/A' }}</td>

                        <td>{{ $department->created_at?->toFormattedDateString() }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a class="menu-link px-3" wire:click.prevent="set('department', {{ $department }})">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="3">No Results Found</td>
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
    {{-- <x-layouts.page-scripts>
        <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    </x-layouts.page-scripts>

    <x-layouts.page-styles>
        <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<script src="assets/js/custom/apps/customers/list/list.js"></script>
		<script src="assets/js/custom/apps/customers/add.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
    </x-layouts.page-styles> --}}
</div>
