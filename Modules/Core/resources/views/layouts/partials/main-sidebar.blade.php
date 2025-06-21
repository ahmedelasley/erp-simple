<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('dashboard') }}"><img src="{{URL::asset('assets/back/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ route('dashboard') }}"><img src="{{URL::asset('assets/back/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ route('dashboard') }}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ route('dashboard') }}"><img src="{{URL::asset('assets/back/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/back/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">Premium Member</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">

            {{-- @include('dashboard::layouts.partials.menu')
            @include('supplier::layouts.partials.menu')
            @include('warehouse::layouts.partials.menu')
            @include('material::layouts.partials.menu')
            @include('product::layouts.partials.menu')
            @include('extra::layouts.partials.menu')
            @include('setting::layouts.partials.menu') --}}

            {{-- <x-slides.slide-menu :value="__(key: 'Charts')">
                <x-slides.slide-item :value="__(key: 'Morris Charts')" :route="route('dashboard')" />
                <x-slides.slide-item :value="__(key: 'Flot Charts')" :route="route('dashboard')" />
            </x-slides.slide-menu> --}}

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
