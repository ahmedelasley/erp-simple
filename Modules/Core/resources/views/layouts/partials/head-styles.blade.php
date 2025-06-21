<!-- Title -->
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/back/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/back/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/back/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/back/plugins/sidebar/sidebar.css')}}" rel="stylesheet">


@if (App::getLocale() == 'ar')
    <!--- RTL css -->

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/back/css-rtl/sidemenu.css')}}">
    @yield('css')
    <!--- Style css -->
    <link href="{{URL::asset('assets/back/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/back/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/back/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else
    <!--- LTR css -->

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/back/css/sidemenu.css')}}">
    @yield('css')
    <!--- Style css -->
    <link href="{{URL::asset('assets/back/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/back/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/back/css/skin-modes.css')}}" rel="stylesheet">

@endif


<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">





