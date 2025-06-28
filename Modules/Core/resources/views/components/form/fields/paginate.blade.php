@props([
    'paginate' => '',
    'items' => []
])

<div class=" m-3" style="margin-inline-start: 10px">
    <button type="button" class="btn btn-outline-light btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Paginate') }}">
        <b>{{ $paginate }}</b>
    </button>
    <ul class="dropdown-menu table-bordered table-striped table-hover text-bold text-md-wrap">
        @foreach ($items as $item)
            <li>
                <a class="dropdown-item {{ $paginate == $item ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate('{{ $item }}')">
                    <b>{{ __($item) }}</b>
                </a>
            </li>
        @endforeach
    </ul>
</div>