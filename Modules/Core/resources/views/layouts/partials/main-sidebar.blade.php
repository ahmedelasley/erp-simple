<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                @module('AuthCore')
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{ URL::asset('assets/back/img/faces/6.jpg') }}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                        <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                        <span class="mb-0 text-muted">Premium Member</span>
                    </div>
                </div>
                @endmodule
        </div>
        <ul class="side-menu">
            @module('Dashboard')
                @include('dashboard::layouts.partials.slide')
            @endmodule
            @module('HR')
                @include('hr::layouts.partials.slide')
            @endmodule
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
