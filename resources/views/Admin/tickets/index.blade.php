<x-layout-admin>
	
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
 				<!--end::Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
					<!--begin::Item-->
 					<!--end::Item-->
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!--begin::Filter menu-->
				<div class="m-0">
					<!--begin::Menu toggle-->
 					<!--end::Menu toggle-->
					<!--begin::Menu 1-->
					<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63de8af02605c">
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
									<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_63de8af02605c" data-allow-clear="true">
										<option></option>
										<option value="1">Approved</option>
										<option value="2">Pending</option>
										<option value="2">In Process</option>
										<option value="2">Rejected</option>
									</select>
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
									<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
										<input class="form-check-input" type="checkbox" value="1" />
										<span class="form-check-label">Author</span>
									</label>
									<!--end::Options-->
									<!--begin::Options-->
									<label class="form-check form-check-sm form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="2" checked="checked" />
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
								<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
									<label class="form-check-label">Enabled</label>
								</div>
								<!--end::Switch-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex justify-content-end">
								<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
								<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
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
				<!--begin::Primary button-->
 				<!--end::Primary button-->
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
			<!--begin::Heading-->
			<div class="d-flex flex-wrap flex-stack mb-6">
				<!--begin::Title-->
				<h3 class="fw-bold my-2">My Contacts
 				<!--end::Title-->
				<!--begin::Controls-->
				<div class="d-flex my-2">
					<!--begin::Select-->
					 
					<!--end::Select-->
				</div>
				<!--end::Controls-->
			</div>
			<!--end::Heading-->
			<!--begin::Contacts-->
			<div class="row g-6 g-xl-9">
				<!--begin::Col-->
				@foreach ($tickets as $ticket)
					<div class="col-md-6 col-xxl-4">
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card body-->
							<div class="card-body d-flex flex-center flex-column p-9">
								<!--begin::Wrapper-->
								<div class="mb-5">
									<!--begin::Avatar-->
									<div class="symbol symbol-75px symbol-circle">
										<img alt="Pic" src="{{ $ticket->customer->image_path }}" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Name-->
								<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $ticket->customer->name }}</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="fw-semibold text-gray-400 mb-6">{{ $ticket->title }}</div>
								<!--end::Position-->
								<!--begin::Info-->
								<div class="d-flex flex-center flex-wrap mb-5">
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mx-3 mb-3">
										<div class="fs-6 fw-bold text-gray-700">{{ $ticket->priority }}</div>
										<div class="fw-semibold text-gray-400">priority</div>
									</div>
									<!--end::Stats-->
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 mx-3 px-4 mb-3">
										<div class="fs-6 fw-bold text-gray-700">{{ $ticket->type }}</div>
										<div class="fw-semibold text-gray-400">type</div>
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Info-->
								<!--begin::Link-->
								<a class="btn btn-sm btn-light-primary fw-bold" href="{{ route('tickets.show',$ticket->id) }}" data-kt-drawer-show="true"  >Send Message</a>
								<!--end::Link-->
							</div>
							<!--begin::Card body-->
						</div>
						<!--begin::Card-->
					</div>
				@endforeach
				<!--end::Col-->

				

				<!--end::Col-->
			</div>
			<!--end::Contacts-->
			<!--begin::Pagination-->
		
			<!--end::Pagination-->
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
                            
</x-layout-admin>
