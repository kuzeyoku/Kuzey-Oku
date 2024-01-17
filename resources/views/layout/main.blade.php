<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('setting.general.title'))</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
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
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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

    <script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('assets/js/main-slider-script.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
