<x-layout-admin>
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
            <!--begin::Content-->
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            The Permissions</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Filter menu-->
                        <div class="m-0">
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                id="kt_menu_63de8abce30cf">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid select2-hidden-accessible"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-dropdown-parent="#kt_menu_63de8abce30cf" data-allow-clear="true"
                                                data-select2-id="select2-data-1-04w3" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option data-select2-id="select2-data-3-n4s2"></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-2-d5on"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single form-select form-select-solid"
                                                        permission="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-ruru-container"
                                                        aria-controls="select2-ruru-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-ruru-container" permission="textbox"
                                                            aria-readonly="true" title="Select option"><span
                                                                class="select2-selection__placeholder">Select
                                                                option</span></span><span
                                                            class="select2-selection__arrow"
                                                            permission="presentation"><b
                                                                permission="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1">
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    checked="checked">
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="notifications" checked="checked">
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                        </div>
                        <!--end::Filter menu-->
                        <!--begin::Secondary button-->
                        <!--end::Secondary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Products-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor"></rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-ecommerce-order-filter="search"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Search Order" fdprocessedid="ody36s">
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div id="kt_ecommerce_sales_table_wrapper"
                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                        id="kt_ecommerce_sales_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                {{-- <th class="w-10px pe-2 sorting_disabled" rowspan="1"
                                                    colspan="1" aria-label=""
                                                    style="width: 29.8906px;">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                                            value="1">
                                                    </div>
                                                </th> --}}
                                                <th class="min-w-100px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Order ID: activate to sort column ascending"
                                                    style="width: 135.906px;">#</th>
                                                <th class="min-w-175px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Customer: activate to sort column ascending"
                                                    style="width: 317.828px;">Permissions Name</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 99.4844px;">Permissions Guard</th>
                                                <th class="text-end min-w-70px sorting" tabindex="0"
                                                    aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 99.4844px;">Assigened</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody class="fw-semibold text-gray-600">

                                            @foreach ($permissions as $permission)
                                                <tr class="odd">
                                                    <!--begin::Order ID=-->
                                                    <td data-kt-ecommerce-order-filter="order_id">
                                                        <a href="#"
                                                            class="text-gray-800 text-hover-primary fw-bold">{{ $i++ }}</a>
                                                    </td>
                                                    <!--end::Order ID=-->
                                                    <!--begin::Customer=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a
                                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $permission->name }}</a>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--end::Customer=-->
                                                    <!--begin::Status=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="badge badge-light-primary">
                                                                    {{ $permission->guard_name }}</div>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!--end::Badges-->
                                                    <!--end::Status=-->
                                                    <!--begin::Checkbox-->
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" onclick="assignPermission('{{ $role->id }}', '{{ $permission->id }}')" type="checkbox"
                                                                @if ($permission->assigned) checked @endif id="permission_{{ $permission->id }}" value="1">
                                                        </div>
                                                    </td>
                                                    <!--end::Checkbox-->
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Products-->
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->

                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
            </div>

            <script>
                function assignPermission(roleId, permissionId) {
                    axios.post('/admin/permissions/role', {
                        role_id: roleId,
                        permission_id: permissionId
                    })
                    .then(function(response) {
                        console.log(response.data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Role Updated successfully',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    })
                    .catch(function(error) {
                        console.log(error.response.data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    });
                }
            </script>
</x-layout-admin>
