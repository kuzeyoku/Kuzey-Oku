<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <title>@lang('admin/auth.title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ themeAsset('admin', 'img/favicon.png') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/style.css') }}">
</head>

<body class="account-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper bg-img">
                <div class="login-content">
                    {{ Form::open(['url' => route('admin.auth.forgot_password')]) }}
                    <div class="login-userset">
                        <div class="login-logo logo-normal">
                            <img src="{{ themeAsset('admin', 'img/logo.png') }}" alt="img">
                        </div>
                        <a href="{{ route('admin.index') }}" class="login-logo logo-white">
                            <img src="{{ themeAsset('admin', 'img/logo-white.png') }}" alt="">
                        </a>
                        <div class="login-userheading">
                            <h3>@lang('admin/auth.forgot_password')</h3>
                            <h4>@lang('admin/auth.forgot_password_description')</h4>
                        </div>
                        <div class="form-login">
                            {{ Form::label(__('admin/auth.email')) }}
                            <div class="form-addons">
                                {{ Form::email('email', null, ['class' => 'form-control mb-0', 'placeholder' => __('admin/auth.email_placeholder')]) }}
                                <img src="{{ themeAsset('admin', 'img/icons/mail.svg') }}" alt="img">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Şifremi Sıfırla</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Yada<a href="{{ route('admin.auth.login') }}" class="hover-a"> Giriş Yap </a></h4>
                        </div>
                        <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                            <p>@lang('admin/auth.copyright', ['year' => date('Y')])</p>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ themeAsset('admin', 'js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/feather.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/theme-script.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/sweetalert/sweetalerts.min.js') }}"></script>
    @include(themeView('admin', 'layout.alert'))
    <script src="{{ themeAsset('admin', 'js/script.js') }}"></script>
</body>

</html>
