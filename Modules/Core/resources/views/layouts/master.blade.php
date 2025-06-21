<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">

    @include('core::layouts.partials.head')


    <!--begin::Body-->
    <body class="main-body app sidebar-mini footer-fixed">

        <!--begin::Section Loader-->
		@include('core::layouts.partials.loader')
        <!--end::Section Loader-->

        <!--begin::Section Main Sidebar-->
		@include('core::layouts.partials.main-sidebar')
        <!--end::Section Main Sidebar-->

		<!-- main-content -->
		<div class="main-content app-content">
            <!--begin::Section Main Header-->
			@include('core::layouts.partials.main-header')
            <!--end::Section Main Header-->

            <!--begin::Container-->
            <div class="container-fluid">

                <!--begin::Section Page Header-->
                @yield('page-header')
                @include('core::layouts.partials.content-header')
                <!--end::Section Page Header-->

                <!--begin::Section Content-->
                @yield('content')
                <!--end::Section Content-->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!--begin::App Footer-->
        @include('core::layouts.partials.sidebar')
        <!--end::App Footer-->

        <!--begin::App Footer-->
        @include('core::layouts.partials.models')
        <!--end::App Footer-->

        <!--begin::App Footer-->
        @include('core::layouts.partials.footer')
        <!--end::App Footer-->

        <!--begin::Page Scripts-->
        @include('core::layouts.partials.footer-scripts')
        <!--end::Page Scripts-->

    </body>
    <!--end::Body-->
</html>
