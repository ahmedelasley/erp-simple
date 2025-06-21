<!--begin::App Content Header-->
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">@yield('title-header')</h5>
            <nav>
                <ol class="breadcrumb mb-0">
                    @yield('nav-header')
                    {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Icons</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Icons</li> --}}
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content">
            @yield('side-header')
        </div>
    </div>
    <!-- breadcrumb -->
    <!--end::App Content Header-->
