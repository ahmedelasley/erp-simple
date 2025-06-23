<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
                <a href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
                <a href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            @include('core::layouts.partials.header-partials.language')

            <div class="nav nav-item  navbar-nav-right ml-auto">

                @include('core::layouts.partials.header-partials.search')
                @include('core::layouts.partials.header-partials.message')
                @include('core::layouts.partials.header-partials.notification')
                @include('core::layouts.partials.header-partials.full-screen')
                @include('core::layouts.partials.header-partials.profile-menu')

                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
