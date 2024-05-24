<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('setting.general.title'))</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/linear.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tm-bs-mp.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tm-utility-classes.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    @stack('style')
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">

        <div class="preloader"></div>

        @include('layout.header')


        @yield('content')


        @include('layout.footer')

    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    @include('layout.alert')
    @stack('script')
</body>

</html>
