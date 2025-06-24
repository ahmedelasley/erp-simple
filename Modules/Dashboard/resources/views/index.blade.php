@extends('core::layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <x-core::tables.get-data>
						<x-core::tables.partials.table-header :columns="[
							['label' => 'ID', 'sortField' => 'id', 'sortDirection' => 'asc'],
							['label' => 'Name', 'sortField' => 'name', 'sortDirection' => 'asc'],
							['label' => 'Email', 'sortField' => 'email'],
							['label' => 'Created At', 'sortField' => 'created_at'],
							['label' => 'Actions', 'sortField' => '', 'clickBtn' => '', 'class' => 'text-center']
						]" />
						@php 
							// Example data, replace with your actual data source
							$users = [
								['id' => 1, 'name' => 'John Doe', 'status' => '' , 'email' => '' , 'created_at' => '2023-10-01'],
								['id' => 2, 'name' => 'Jane Smith', 'status' => '', 'email' => '' , 'created_at' => '2023-10-02'],
								['id' => 3, 'name' => 'Alice Johnson', 'status' => '', 'email' => '' , 'created_at' => '2023-10-03'],
								['id' => 4, 'name' => 'Bob Brown', 'status' => '', 'email' => '' , 'created_at' => '2023-10-04'],
								['id' => 5, 'name' => 'Charlie White', 'status' => '', 'email' => '' , 'created_at' => '2023-10-05'],
							];

						@endphp
						{{-- @foreach ($users as $user)
							<x-core::tables.partials.table-body>
								<x-core::tables.partials.td class="text-center" column="{{ $user['id'] }}" />
								<x-core::tables.partials.td class="text-center" column="name" link="{{ route('dashboard.index') }}" />
								<x-core::tables.partials.td class="text-center" column="email" />
								<x-core::tables.partials.td class="text-center" column="created_at" />
								<x-core::tables.partials.action-button :actions="[
									['label' => __('View'), 'icon' => 'bx bx-show', 'event' => 'viewRow', 'confirm' => false],
									['label' => __('Edit'), 'icon' => 'bx bx-edit', 'event' => 'editRow', 'confirm' => true],
									['label' => __('Delete'), 'icon' => 'bx bx-trash', 'event' => 'deleteRow', 'confirm' => true, 'class' => 'text-danger'],
									['divider' => true],
									['label' => __('Export'), 'icon' => 'bx bx-export', 'route' => route('dashboard.index')],
								]"/>
							</x-core::tables.partials.table-body>
						@endforeach --}}
						@foreach ($users as $user)
							<x-core::tables.partials.table-body 
								:columns="['id', 'name', 'email']" 
								:data="$user" 
								:actions="[
									['label' => __('View'), 'icon' => 'bx bx-show', 'event' => 'viewRow', 'confirm' => false],
									['label' => __('Edit'), 'icon' => 'bx bx-edit', 'event' => 'editRow', 'confirm' => true],
									['label' => __('Delete'), 'icon' => 'bx bx-trash', 'event' => 'deleteRow', 'confirm' => true, 'class' => 'text-danger'],
									['divider' => true],
									['label' => __('Export'), 'icon' => 'bx bx-export', 'route' => route('dashboard.index')],
								]"
							/>
						@endforeach 
					</x-core::tables.get-data>

					<x-core::tables.dynamic-table
    :columns="[
        ['label' => 'ID', 'field' => 'id'],
        ['label' => 'Name', 'field' => 'name'],
        ['label' => 'Status', 'field' => 'status', 'type' => 'badge'],
        ['label' => 'Email', 'field' => 'email'],
        ['label' => 'Created At', 'field' => 'created_at', 'type' => 'date'],
    ]"
    :rows="$users"
    :actions="[
        ['label' => __('Details'), 'event' => 'show_user', 'icon' => 'bx bx-info-circle'],
        ['label' => __('Edit'), 'event' => 'edit_user', 'icon' => 'bx bx-edit'],
        ['divider' => true],
        ['label' => __('Delete'), 'event' => 'delete_user', 'icon' => 'bx bx-trash', 'class' => 'text-danger', 'confirm' => true],
    ]"
/>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection