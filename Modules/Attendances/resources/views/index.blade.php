@extends('core::layouts.master')

@section('title-header', __('Attendances'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Attendances') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('attendances.index')}}"><option value="" selected>{{ __('Attendances') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('attendances.create')
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('attendances.get-data')
				</div>
				<!-- row closed -->
                @livewire('attendances.show', [], 'show_attendance_' . now()->timestamp )
                @livewire('attendances.edit', [], 'edit_attendance_' . now()->timestamp )
                @livewire('attendances.delete', [], 'delete_attendance_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-attendance-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-attendance-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-attendance-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('delete-attendance-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
