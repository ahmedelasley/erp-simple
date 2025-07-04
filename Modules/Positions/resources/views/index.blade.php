@extends('core::layouts.master')

@section('title-header', __('Positions'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Positions') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('positions.index')}}"><option value="" selected>{{ __('Positions') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('positions.create')
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('positions.get-data')
				</div>
				<!-- row closed -->
                @livewire('positions.show', [], 'show_position_' . now()->timestamp )
                @livewire('positions.edit', [], 'edit_position_' . now()->timestamp )
                @livewire('positions.delete', [], 'delete_position_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-position-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-position-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-position-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-position-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-position-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
