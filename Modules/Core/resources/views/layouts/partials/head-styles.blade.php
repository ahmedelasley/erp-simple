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

@yield('css')

@if (App::getLocale() == 'ar')
    <!--- RTL css -->

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/back/css-rtl/sidemenu.css')}}">
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
    
    <!--- Style css -->
    <link href="{{URL::asset('assets/back/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/back/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/back/css/skin-modes.css')}}" rel="stylesheet">

@endif

<style>
.dropdown-menu {
    /* max-height: 100px; الحد الأقصى للارتفاع */
    overflow-y: auto; /* تمكين التمرير العمودي */
}
.dropdown-item {
    white-space: nowrap; /* منع التفاف النص */
}
.dropdown-item:hover {
    background-color: #f8f9fa; /* لون الخلفية عند التمرير */
}
.dropdown-divider {
    margin: 0.5rem 0; /* مسافة بين العناصر */
}
.dropdown-item b {
    font-weight: bold; /* جعل النص داخل العنصر بارز */
}
.dropdown-item i {
    margin-right: 0.5rem; /* مسافة بين الأيقونة والنص */
}
.dropdown-toggle::after {
    display: none !important;/* إخفاء السهم المنسدل */
}
</style>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">





