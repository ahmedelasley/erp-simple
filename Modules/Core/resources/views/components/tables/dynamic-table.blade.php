@props([
    'columns' => [],
    'rows' => [],
    'actions' => [],
])
<div class="table-responsive hoverable-table">
    
    <table class="table table-striped table-bordered table-hover text-md-wrap text-center">
        {{-- <thead> --}}
            <tr class="bg-dark fs-14 text-bold text-white text-center">
                    @foreach ($columns as $column)
                        @php
                            $sortField = $column['sortField'] ?? null;
                            $sortDirection = $column['sortDirection'] ?? 'asc';
                        @endphp
                        <th>
                            @if($sortField && $sortDirection)
                                <a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click.prevent="{{ $sortField }}('{{ $sortDirection }}')">
                                    <span>{{ __($column['label']) }}</span>
                                    <i class="bx bx-chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                </a>
                            @else
                                <th>{{ __($column['label']) }}</th>
                            @endif
                        </th>

                    @endforeach
                <th>{{ __('Actions') }}</th>
            </tr>
        {{-- </thead> --}}
        <tbody>
            @forelse ($rows as $row)
                <tr>
                    @foreach ($columns as $column)
                        @php
                            $value = data_get($row, $column['field']);
                            $type = $column['type'] ?? 'text';
                        @endphp

                        <td>
                            @switch($type)
                                @case('badge')
                                    <span class="badge {{ $value}}">{{ $value }}</span>
                                    @break

                                @case('date')
                                    {{ \Carbon\Carbon::parse($value)->format('Y-m-d') }}
                                    @break

                                @case('image')
                                    <img src="{{ $value }}" alt="Image" width="50">
                                    @break

                                @default
                                    {{ $value }}
                            @endswitch
                        </td>
                    @endforeach

                    <x-core::tables.partials.action-button 
                        :actions="$actions"
                    />

                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 1 }}" class="text-center text-muted">{{ __('No data found.') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{-- exmaple --}}
{{--
<x-core::tables.dynamic-table
    :columns="[
        ['label' => 'ID', 'field' => 'id', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'asc'],
        ['label' => 'Name', 'field' => 'name', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'asc'],
        ['label' => 'Status', 'field' => 'status', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'asc', 'type' => 'badge'],
        ['label' => 'Email', 'field' => 'email', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'asc'],
        ['label' => 'Created At', 'field' => 'created_at', 'clickBtn' => '' ,'sortField' => 'id', 'sortDirection' => 'asc', 'type' => 'date'],
    ]"
    :rows="$users"
    :actions="[
        ['label' => __('Details'), 'event' => 'show_user', 'icon' => 'bx bx-info-circle'],
        ['label' => __('Edit'), 'event' => 'edit_user', 'icon' => 'bx bx-edit'],
        ['divider' => true],
        ['label' => __('Delete'), 'event' => 'delete_user', 'icon' => 'bx bx-trash', 'class' => 'text-danger', 'confirm' => true],
    ]"
/>
--}}