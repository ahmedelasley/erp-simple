@props([
    'column' => '',
    'clickBtn' => 'sortBy',
    'sortField' => 'id',
    'sortDirection' => 'asc',
])
<style>
  .link-no-color {
    color: inherit;
    text-decoration: none;
  }
</style>
<th class="text-uppercase">
  <a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click.prevent="{{ $clickBtn }}('{{ $sortField }}')">
    <span>{{ __($column) }}</span>

    <i class="bx bx-chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
  </a>
</th>

{{-- example --}}
{{-- <x-core::tables.partials.th column="Name" clickBtn="sortBy" sortField="name" sortDirection="asc" /> --}}
{{-- <x-core::tables.partials.th column="Name" clickBtn="sortBy" sortField="name" /> --}}
{{-- <x-core::tables.partials.th column="Name" /> --}}
{{-- <x-core::tables.partials.th /> --}} 