@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-3">
            {{ html()->file('header-logo')->class('dropify-image')->attribute('data-default-file', $service->getMedia('header-logo'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('footer-logo')->class('dropify-image')->attribute('data-default-file', $service->getMedia('footer-logo'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('cover')->class('dropify-image')->attribute('data-default-file', $service->getMedia('cover'))->accept('.png, .jpg, .jpeg, .gif') }}
        </div>
        <div class="col-lg-3">
            {{ html()->file('favicon')->class('dropify-image')->attribute('data-default-file', $service->getMedia('favicon'))->accept('.png, .ico') }}
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/dropify.min.css') }}">
@endpush
@push('script')
    <script src="{{ themeAsset('admin', 'js/dropzone.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/dropify.min.js') }}"></script>
@endpush
