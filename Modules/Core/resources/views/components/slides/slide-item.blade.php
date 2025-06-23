@props(['value' => null, 'route' => null, 'badgeValue' => null, 'badgeColor' => null])

@php
    $route = $route ?? 'javascript:void(0);';
    $value = $value ?? 'Slide';
    $badgeColor = $badgeColor ?? 'primary';
    
@endphp

<!-- slide -->
<li>
    <a class="slide-item" href="{{ $route }}">{{ $value }}</a>
    @if ($badgeValue)
      <span class="badge badge-{{ $badgeColor }} side-badge">{{ $badgeValue }}</span>
    @endif
</li>
<!-- /slide -->
