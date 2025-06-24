@props([
    'columns' => [], // Define the columns for the table header 
])

<style>
  .link-no-color {
    color: inherit;
    text-decoration: none;
  }
  .link-no-color:hover {
    color: inherit; /* Maintain the text color on hover */
    text-decoration: none; /* Remove underline on hover */
  }
  .link-no-color :focus {
    color: inherit; /* Maintain the text color on focus */
    text-decoration: none; /* Remove underline on focus */
  }
</style>
{{-- <thead> --}}
  <tr class="bg-dark fs-14 text-bold text-white text-center">
    @forelse ($columns as $column)
        @php
            $label = $column['label'] ?? 'Action';
            $sortField = $column['sortField'] ?? 'created_at';
            $sortDirection = $column['sortDirection'] ?? 'asc';
            $clickBtn = $column['clickBtn'] ?? 'sortBy';
        @endphp

        <th class="text-uppercase">
          @if($clickBtn && $sortField)
          <a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click.prevent="{{ $clickBtn }}('{{ $sortField }}')">
            <span>{{ __($label) }}</span>
            <i class="bx bx-chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
          </a>
          @else
          <span>{{ __($label) }}</span>
          @endif
        </th>


    @empty
        <li class="dropdown-item text-muted">{{ __('No Actions') }}</li>
    @endforelse
  </tr>
{{-- </thead> --}}


{{-- example --}}
{{-- <x-core::tables.partials.table-header :columns="[
	['label' => 'ID', 'sortField' => 'id', 'sortDirection' => 'asc'],
    ['label' => 'Name', 'sortField' => 'name', 'sortDirection' => 'asc'],
    ['label' => 'Email', 'sortField' => 'email'],
	['label' => 'Created At', 'sortField' => 'created_at'],
	['label' => 'Actions', 'sortField' => '', 'clickBtn' => '', 'class' => 'text-center']
]" /> --}}


