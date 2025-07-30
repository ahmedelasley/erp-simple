@extends('core::layouts.master')

@section('title-header', __('attributes'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('attributes') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('attributes.index')}}"><option value="" selected>{{ __('attributes') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('attributes.create')
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('attributes.get-data')
				</div>
				<!-- row closed -->
                @livewire('attributes.show', [], 'show_attribute_' . now()->timestamp )
                @livewire('attributes.edit', [], 'edit_attribute_' . now()->timestamp )
                @livewire('attributes.delete', [], 'delete_attribute_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-attribute-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-attribute-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-attribute-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-attribute-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-attribute-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
