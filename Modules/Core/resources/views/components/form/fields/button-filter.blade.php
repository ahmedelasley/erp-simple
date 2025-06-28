
@props([
    'searchField' => '',
    'items' => []
])

<div style="margin-inline-start: 10px">
    <button type="button" class="btn btn-secondary btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Filter By') }}" >
        <i class='bx bx-filter-alt'></i>
    </button>
    <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap">
        @foreach ($items as $item)
            <li>
                <a class="dropdown-item {{ $searchField == $item['field'] ? 'active' : '' }}" href="javascript:void(0);" wire:click="searchFilter('{{ $item['field'] }}')">
                    <b>{{ __($item['label']) }}</b>
                </a>
            </li>
        @endforeach
    </ul>
</div>

