@extends('core::layouts.master')

@section('title-header', __('Settings'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('accountingsettings.index')}}"><option value="" selected>{{ __('Accounting Settings') }}</option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        {{-- <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('New', ['type' => __('Manual Journal Entry')]) }}"><b><i class="mdi mdi-plus tx-bold"></i> {{ __('New', ['type' => __('Manual Journal Entry')]) }}</b></button> --}}
        {{-- @livewire('accountingsettings.create-modal') --}}
        {{-- <a href="{{ route('accountingsettings.create') }}" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="{{ __('New Manual Journal Entry') }}"><b><i class="mdi mdi-plus"></i> {{ __('New Manual Journal Entry') }}</b></a> --}}
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('accountingsettings.get-data')
				</div>
				<!-- row closed -->
                {{-- @livewire('accountingsettings.show', [], 'show_accounting_setting_' . now()->timestamp ) --}}
                @livewire('accountingsettings.edit', [], 'edit_accounting_setting_' . now()->timestamp )
                {{-- @livewire('accountingsettings.delete', [], 'delete_accounting_setting_' . now()->timestamp ) --}}

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        // window.addEventListener('create-accounting-setting-modal', event => {
        //     $('#createModal').modal('toggle');
        // })
        // window.addEventListener('show-accounting-setting-modal', event => {
        //     $('#showModal').modal('toggle');
        // })
        window.addEventListener('edit-accounting-setting-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-accounting-setting-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        // window.addEventListener('delete-accounting-setting-modal', event => {
        //     $('#deleteModal').modal('toggle');
        // })
    </script>
@endsection
