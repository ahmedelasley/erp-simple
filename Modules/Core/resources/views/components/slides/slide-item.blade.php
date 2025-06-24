@props(['value' => null, 'route' => null, 'badgeValue' => null, 'badgeColor' => null])

@php
    $route = $route ?? 'javascript:void(0);';
    $value = $value ?? 'Slide';
    $badgeColor = $badgeColor ?? 'primary';
    
@endphp

<!-- slide -->
<li>
    <a class="slide-item" href="{{ $route }}">{{ __($value) }}</a>
    @if ($badgeValue)
      <span class="badge badge-{{ $badgeColor }} side-badge">{{ $badgeValue }}</span>
    @endif
</li>
<!-- /slide -->


{{-- example --}}
{{-- <x-core::slides.slide-item :value="__('Products')" :route="route('dashboard.index')" :badgeValue="1" /> --}}
{{-- <x-core::slides.slide-item :value="__('Products')" :route="route('dashboard.index')" /> --}}
{{-- <x-core::slides.slide-item :value="__('Products')" /> --}}