@props([
    'actions' => [], // مصفوفة ديناميكية للأزرار
])
<td class="text-center align-middle" style="width: 100px; min-width: 100px; max-width: 100px;">
{{-- make dropdown list can scroll --}}
<div class="dropdown">
    <button type="button" class="btn btn-dark btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-placement="top" title="{{ __('Action') }}">
        <i class='bx bx-dots-vertical'></i>
    </button>

    <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap fs-18">

        @forelse ($actions as $action)
            @php
                $label = $action['label'] ?? 'Action';
                $icon = $action['icon'] ?? 'bx bx-dots-horizontal-rounded';
                $event = $action['event'] ?? null;
                $route = $action['route'] ?? null;
                $confirm = $action['confirm'] ?? false;
                $class = $action['class'] ?? '';
                $isDivider = $action['divider'] ?? false;
            @endphp

            @if ($isDivider)
                <div class="dropdown-divider"></div>
            @elseif ($event)
                <li>
                    <a class="dropdown-item {{ $class }}" href="javascript:void(0);"
                       @if ($confirm)
                           onclick="if(confirm('{{ __('Are you sure?') }}')) { Livewire.dispatch('{{ $event }}') }"
                       @else
                           wire:click.prevent="$dispatch('{{ $event }}')"
                       @endif
                    >
                        <b><i class="{{ $icon }}"></i> {{ $label }}</b>
                    </a>
                </li>
            @elseif ($route)
                <li>
                    <a class="dropdown-item {{ $class }}" href="{{ $route }}">
                        <b><i class="{{ $icon }}"></i> {{ $label }}</b>
                    </a>
                </li>
            @endif

        @empty
            <li class="dropdown-item text-muted">{{ __('No Actions') }}</li>
        @endforelse

    </ul>
</div>
</td>
{{-- Example usage --}}
{{-- <x-core::tables.partials.action-button :actions="[
    ['label' => __('View'), 'icon' => 'bx bx-show', 'event' => 'viewRow', 'confirm' => false],
    ['label' => __('Edit'), 'icon' => 'bx bx-edit', 'event' => 'editRow', 'confirm' => true],
    ['label' => __('Delete'), 'icon' => 'bx bx-trash', 'event' => 'deleteRow', 'confirm' => true, 'class' => 'text-danger'],
    ['divider' => true],
    ['label' => __('Export'), 'icon' => 'bx bx-export', 'route' => route('export.data')],
]"/> --}}