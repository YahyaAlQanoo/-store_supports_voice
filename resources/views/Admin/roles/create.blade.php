<x-layout-admin>
    <br>
    <div class="container mt-5">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Create Role</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title=""
                            data-original-title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title=""
                            data-original-title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    </div>

                    <br>
                    <br>
                     <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_ecommerce_sales_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        
                                        
                                        <th class="min-w-100px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                            colspan="1"
                                            aria-label="Order ID: activate to sort column ascending"
                                            style="width: 317.828px;">Abilities</th>
                                        <th class="min-w-175px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                            colspan="1"
                                            aria-label="Customer: activate to sort column ascending"
                                            style="width: 135.906px;"> </th>
                                        <th class="text-end min-w-70px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                            colspan="1"
                                            aria-label="Status: activate to sort column ascending"
                                            style="width: 99.4844px;"> </th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                @php
                                    $i = 1;
                                @endphp
                                <tbody class="fw-semibold text-gray-600">

                                    @foreach ( app('abilities') as $ability_code => $ability_name )
                                        <tr class="odd">
                                            <td data-kt-ecommerce-order-filter="order_id" >
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bold">{{ $ability_name }}</a>
                                            </td>

                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid"> 
                                                    <input class="form-check-input"  type="radio" name="abilities[{{ $ability_code }}]" value="allow" @checked(($role_abilities[$ability_code] ?? '') == 'allow')>allow 
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid"> 
                                                    <input class="form-check-input"  type="radio"  name="abilities[{{ $ability_code }}]" value="deny" @checked(($role_abilities[$ability_code] ?? '') == 'deny')> deny
                                                </div>
                                            </td>

                                            <!--end::Order ID=-->
                                        
                                        

                                            <!--end::Badges-->
                                            <!--end::Status=-->
                                            <!--begin::Checkbox-->
                                        
                                            <!--end::Checkbox-->
                                        </tr>
                                    @endforeach

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit"  class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>

    <script>
        function createRole() {
            let data = {
                name: document.getElementById('name').value,
                guard_name: document.getElementById('guard_name').value,
            };

            axios.post('/admin/roles', data)
                .then(function(response) {
                    console.log(response.data);
                    Swal.fire('Success', 'Role created successfully', 'success');
                })
                .catch(function(error) {
                    console.log(error.response.data);
                    Swal.fire('Error', 'An error occurred', 'error');
                });
        }
    </script>





 

</x-layout-admin>
