@props([
    'date' => null,
    'format' => 'Y-m-d H:i',
    'class' => 'text-muted',
])

<span class="{{ $class }}">
    {{ $date ? \Carbon\Carbon::parse($date)->format($format) : '-' }}
</span>

{{-- Usage --}}
{{-- <x-core::date-format :date="$item->created_at" /> --}}
{{-- <x-core::date-format :date="$item->created_at" format="d/m/Y" /> --}}