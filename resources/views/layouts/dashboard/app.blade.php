<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>:: وظائف غزة ::</title>
    <link rel="icon" href="{{asset('suitcase.svg')}}" type="image/x-icon"> <!-- Favicon-->

    @stack('styles')

    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('dashboard_files/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/morrisjs/morris.min.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/color_skins.css')}}">

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"--}}
    {{--rel="stylesheet">--}}
    {{--<style>--}}
    {{--* {--}}
    {{--font-family: cairo;--}}
    {{--}--}}
    {{--</style>--}}

</head>
<body class="theme-cyan rtl">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('suitcase.svg')}}" width="48" height="48" alt="Oreo">
        </div>
        <p>الرجاء الانتظار...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">
                    <img src="{{asset('suitcase.svg')}}" width="30" alt="Oreo">
                    <span class="m-l-10">وظائف غزة</span>
                </a>
            </div>
        </li>
        <li>
            <a href="javascript:void(0);" class="ls-toggle-btn" data-close="true">
                <i class="zmdi zmdi-swap"></i>
            </a>
        </li>

        <li class="d-none d-lg-inline-block">
            <a href="/" title="Website">
                <i class="zmdi zmdi-globe-alt"></i>
            </a>
        </li>
        <li class="d-none d-lg-inline-block">
            <a href="{{route('dashboard.admins.edit', auth()->guard('admin')->user())}}" title="Profile">
                <i class="zmdi zmdi-account-box"></i>
            </a>
        </li>

        <li class="float-right">
            <a href="{{route('dashboard.logout')}}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i>
                تسجيل خروج</a>
        </li>
    </ul>
</nav>

@include('layouts.dashboard._aside')

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/vendorscripts.bundle.js')}}"></script>
<!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<!-- Bootstrap Notify Plugin Js -->


<script src="{{asset('dashboard_files/rtl/assets/bundles/morrisscripts.bundle.js')}}"></script>
<!-- Morris Plugin Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/jvectormap.bundle.js')}}"></script>
<!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/knob.bundle.js')}}"></script>
<!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{asset('dashboard_files/rtl/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard_files/rtl/assets/js/pages/ui/notifications.js')}}"></script> <!-- Custom Js -->
<script src="{{asset('dashboard_files/rtl/assets/js/pages/index.js')}}"></script>

@stack('scripts')

</body>
</html>