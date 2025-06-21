<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">

    @include('core::layouts.partials.head')

    <!--begin::Body-->
	<body class="main-body bg-primary-transparent">
        <!--begin::Section Loader-->
		@include('core::layouts.partials.loader')
        <!--end::Section Loader-->

        <!--begin::Section Content-->
        @yield('content')
        <!--end::Section Content-->

        <!--begin::Page Scripts-->
        @include('core::layouts.partials.footer-scripts')
        <!--end::Page Scripts-->

    </body>
    <!--end::Body-->
</html>
