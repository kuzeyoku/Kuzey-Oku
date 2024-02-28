<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos Admin Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ themeAsset('admin', 'img/favicon.png') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/animate.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/fontawesome.min.css') }}">
    @stack('style')
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        @include(themeview('admin', 'layout.header'))
        @include(themeView('admin', 'layout.sidebar'))
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
    <script src="{{ themeAsset('admin', 'js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/feather.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/sweetalert/sweetalerts.min.js') }}"></script>
    @stack('script')
    <script src="{{ themeAsset('admin', 'js/script.js') }}"></script>
</body>

</html>
