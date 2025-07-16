@extends('core::layouts.master')

@section('title-header', __('Accounts'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('journalentries.index')}}"><option value="" selected>{{ __('Journal Entries') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        {{-- <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button> --}}
        <a href="{{ route('journalentries.create') }}" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="{{ __('New Manual Journal Entry') }}"><b><i class="mdi mdi-plus"></i> {{ __('New Manual Journal Entry') }}</b></a>
        {{-- @livewire('accounts.create') --}}
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('journalentries.get-data')
				</div>
				<!-- row closed -->
                {{-- @livewire('accounts.show', [], 'show_account_' . now()->timestamp )
                @livewire('accounts.edit', [], 'edit_account_' . now()->timestamp )
                @livewire('accounts.delete', [], 'delete_account_' . now()->timestamp ) --}}

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-account-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-account-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-account-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-account-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-account-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
