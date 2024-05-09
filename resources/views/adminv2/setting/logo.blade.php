@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-4">
            {{ Form::label('header', __('admin/setting.logo_header'), ['class' => 'd-block']) }}
            {{ Form::file('header', [
                'class' => 'dropify-image',
                'data-default-file' => asset('storage/' . config('setting.image.folder', 'image') . '/' . 'header_logo.png'),
                'accept' => '.png, .jpg, .jpeg, .gif',
            ]) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('footer', __('admin/setting.logo_footer'), ['class' => 'd-block']) }}
            {{ Form::file('footer', [
                'class' => 'dropify-image',
                'data-default-file' => asset('storage/' . config('setting.image.folder', 'image') . '/' . 'footer_logo.png'),
                'accept' => '.png, .jpg, .jpeg, .gif',
            ]) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('favicon', __('admin/setting.logo_favicon'), ['class' => 'd-block']) }}
            {{ Form::file('favicon', [
                'class' => 'dropify-image',
                'data-default-file' => asset('storage/' . config('setting.image.folder', 'image') . '/' . 'favicon.ico'),
                'accept' => '.png, .ico',
            ]) }}
        </div>
    </div>
@endsection
