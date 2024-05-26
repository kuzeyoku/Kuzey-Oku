@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-3">
            {{ html()->file('header-logo')->class('dropify-image')->attribute('data-default-file', asset('storage/logo/header-logo.png'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('footer-logo')->class('dropify-image')->attribute('data-default-file', asset('storage/logo/footer-logo.png'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('cover')->class('dropify-image')->attribute('data-default-file', asset('storage/logo/cover.png'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('favicon')->class('dropify-image')->attribute('data-default-file', asset('storage/logo/favicon.ico'))->accept('.png, .ico') }}
        </div>
    </div>
@endsectionww
