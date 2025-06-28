@props([
    'items' => []
])

<div style="margin-inline-start: 10px">
    <button type="button" class="btn btn-success btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Export Data') }}" >
        <i class='fa fa-download'></i>
    </button>
    <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap">

        @foreach ($items as $item)
            @php
                $event = $item['event'] ?? null;
                $isDivider = $item['divider'] ?? false;
            @endphp
            <li>
                @if ($isDivider)
                    <div class="dropdown-divider"></div>
                @elseif ($event)
                    <a class="dropdown-item" href="javascript:void(0);" wire:click="{{ $item['event'] }}">
                        <b>{{ __($item['label']) }}</b>
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>