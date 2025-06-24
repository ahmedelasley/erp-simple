@props(['value' => null])

@php
    $value = $value ?? 'Slide';
@endphp

<!-- slide -->
<li class="side-item side-item-category">{{ __($value) }}</li>
<!-- /slide -->

{{-- example --}}
{{-- <x-core::slides.slide-section :value="__(key: 'Dashboard')" /> --}}
{{-- <x-core::slides.slide-section :value="__('Dashboard')" /> --}}
{{-- <x-core::slides.slide-section /> --}}
{{-- <x-core::slides.slide-section value="Dashboard" /> --}}
