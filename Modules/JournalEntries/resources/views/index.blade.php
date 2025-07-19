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
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('New', ['type' => __('Manual Journal Entry')]) }}"><b><i class="mdi mdi-plus tx-bold"></i> {{ __('New', ['type' => __('Manual Journal Entry')]) }}</b></button>
        @livewire('journalentries.create-modal')
        {{-- <a href="{{ route('journalentries.create') }}" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="{{ __('New Manual Journal Entry') }}"><b><i class="mdi mdi-plus"></i> {{ __('New Manual Journal Entry') }}</b></a> --}}
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    @livewire('journalentries.get-data')
				</div>
				<!-- row closed -->
                @livewire('journalentries.show', [], 'show_journal_entry_' . now()->timestamp )
                @livewire('journalentries.edit', [], 'edit_journal_entry_' . now()->timestamp )
                @livewire('journalentries.delete', [], 'delete_journal_entry_' . now()->timestamp )

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        window.addEventListener('create-journal-entry-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-journal-entry-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-journal-entry-modal', event => {
            $('#editModal').modal('toggle');
        })
        // window.addEventListener('toggle-status-journal-entry-modal', event => {
        //     $('#statusModal').modal('toggle');
        // })
        window.addEventListener('delete-journal-entry-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
