@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-4">
            {{ html()->file('header-logo')->class('dropify-image')->attribute(
                    'data-default-file',
                    asset('storage/' . config('setting.image.folder', 'image') . '/' . 'header_logo.png'),
                )->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-4">
            {{ html()->file('footer-logo')->class('dropify-image')->attribute(
                    'data-default-file',
                    asset('storage/' . config('setting.image.folder', 'image') . '/' . 'footer_logo.png'),
                )->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-4">
            {{ html()->file('favicon')->class('dropify-image')->attribute('data-default-file', asset('storage/' . config('setting.image.folder', 'image') . '/' . 'favicon.ico'))->accept('.png, .ico') }}
        </div>
    </div>
@endsection
