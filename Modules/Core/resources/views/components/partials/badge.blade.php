@props([
    'label' => '',
    'color' => 'primary', // يمكن أن يكون: primary, success, danger, warning, info ...
    'class' => '',
])

<span class="badge badge-{{ $color }} {{ $class }}">
    {{ $label }}
</span>

{{-- Usage --}}
{{-- <x-core::partials.badge label="Active" color="success" /> --}}
{{-- <x-core::partials.badge label="Inactive" color="danger" /> --}}
{{-- <x-core::partials.badge label="Pending" color="warning" /> --}}
