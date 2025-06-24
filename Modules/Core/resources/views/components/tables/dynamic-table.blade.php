@props([
    'columns' => [],
    'rows' => [],
    'actions' => [],
])

<table class="table table-bordered table-striped table-hover">
    {{-- <thead> --}}
        <tr class="bg-dark fs-14 text-bold text-white text-center">
            @foreach ($columns as $column)
                <th>{{ __($column['label']) }}</th>
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

                {{-- <td>
                    <x-core::tables.partials.action-button 
                        :actions="array_map(function($action) use ($row) {
                            $action['params']['id'] = $row->id;
                            return $action;
                        }, $actions)"
                    />
                </td> --}}
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

{{-- exmaple --}}
