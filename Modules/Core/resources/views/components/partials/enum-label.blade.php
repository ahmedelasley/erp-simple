@if ($enum)
    <span class="badge badge-{{ $enum->color() ?? 'primary' }}">
        {{ $enum->label() ?? $enum->value }}
    </span>
@else
    <span class="text-muted">-</span>
@endif
