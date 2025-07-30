@extends('core::layouts.master')

@section('title-header', __('Attribute Options'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Attribute Options') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('attribute.options.index')}}"><option value="" selected>{{ __('Attribute Options') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('attribute-options.create')
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('attribute-options.get-data')
				</div>
				<!-- row closed -->
                @livewire('attribute-options.show', [], 'show_attribute_option_' . now()->timestamp )
                @livewire('attribute-options.edit', [], 'edit_attribute_option_' . now()->timestamp )
                @livewire('attribute-options.delete', [], 'delete_attribute_option_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-attribute-option-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-attribute-option-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-attribute-option-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-attribute-option-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-attribute-option-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
