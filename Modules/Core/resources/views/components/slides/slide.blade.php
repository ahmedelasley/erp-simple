@props(['value' => null, 'route' => null, 'img' => null, 'icon' => null, 'badgeValue' => null, 'badgeColor' => null])

@php
    $route = $route ?? 'javascript:void(0);';
    $img = $img ??  URL::asset('assets/back/img/brand/favicon.png') ;
    $value = $value ?? 'Slide';
    // $icon = $icon ?? 'bx bx-home';
    $badgeColor = $badgeColor ?? 'primary';
@endphp

<!-- slide -->
<li class="slide">
    <a class="side-menu__item" href="{{ $route }}">

        @if ($img)
          <img class="side-menu__icon " viewBox="0 0 24 24" src="{{ $img }}" alt="{{ $value }}" >
        @endif

        @if ($icon)
          <i class="side-menu__icon {{ $icon  }}" viewBox="0 0 24 24"></i>
        @endif

        <span class="side-menu__label">
          {{ $value }}
        </span>

        @if ($badgeValue)
          <span class="badge badge-{{ $badgeColor }} side-badge">{{ $badgeValue }}</span>
        @endif
    </a>
</li>
<!-- /slide -->


{{-- example --}}
{{-- <x-core::slides.slide :value="__(key: 'Dashboard')"  :route="route('dashboard.index')" img="" icon="bx bx-home" /> --}}
{{-- <x-core::slides.slide :value="__(key: 'Dashboard')"  :route="route('dashboard.index')" img="{{URL::asset('assets/back/img/brand/favicon.png')}}" icon="" /> --}}
{{-- <x-core::slides.slide :value="__(key: 'Dashboard')"  :route="route('dashboard.index')" img="{{URL::asset('assets/back/img/brand/favicon.png')}}" icon="bx bx-home" /> --}}
{{-- <x-core::slides.slide :value="__(key: 'Dashboard')"  :route="route('dashboard.index')" img="{{URL::asset('assets/back/img/brand/favicon.png')}}" icon="bx bx-home" badgeValue="1" badgeColor="primary" /> --}}
