@extends('core::layouts.master')

@section('title-header', __('categories'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Categories') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('categories.index')}}"><option value="" selected>{{ __('Categories') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('categories.create')
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('categories.get-data')
				</div>
				<!-- row closed -->
                @livewire('categories.show', [], 'show_category_' . now()->timestamp )
                @livewire('categories.edit', [], 'edit_category_' . now()->timestamp )
                @livewire('categories.delete', [], 'delete_category_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-category-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-category-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-category-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-category-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-category-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
