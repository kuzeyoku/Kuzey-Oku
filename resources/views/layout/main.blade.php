<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">
    {!! SEO::generate() !!}
    @setting("general.title")
    @if (config('integration.tag_manager_status') == App\Enums\StatusEnum::Active->value)
        {!! config('integration.tag_manager_head_code') !!}
    @endif
    <link href="{{ themeAsset('front', 'css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/animate.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/owl.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/style.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/responsive.css') }}" rel="stylesheet">
    @stack('style')

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    @if (config('integration.tag_manager_status') == App\Enums\StatusEnum::Active->value)
        {!! config('integration.tag_manager_body_code') !!}
    @endif
    <div class="page-wrapper">
        <div class="preloader"></div>
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
        @include('common.cookie_alert')
    </div>
    <div class="scroll-to-top scroll-to-target" data-target="html">@svg('fas-angle-up', 'text-white')</div>
    <script src="{{ themeAsset('front', 'js/jquery.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/popper.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/bootstrap.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/jquery.fancybox.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/wow.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/appear.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/knob.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/select2.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/owl.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/script.js') }}"></script>
    <script src="{{ themeAsset('common', 'js/jquery.cookie.js') }}"></script>
    @include('common.popup')
    @stack('script')
    @include('common.maintenance')
</body>

</html>
