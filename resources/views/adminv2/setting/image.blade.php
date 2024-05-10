@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row mb-3">
        <div class="col-lg-6">
            {{ html()->label(__('admin/setting.image_folder')) }}
            {{ html()->text('folder', config('setting.image.folder'))->placeholder(__("admin/setting.image_folder_placeholder"))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ html()->label(__('admin/setting.image_max_size')) }}
            {{ html()->number('max_size', config('setting.image.max_size'))->placeholder(__("admin/setting.image_max_size_placeholder"))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ html()->label(__('admin/setting.image_quality')) }}
            {{ html()->number('quality', config('setting.image.quality'))->placeholder(__("admin/setting.image_quality_placeholder"))->class('form-control') }}
        </div>
    </div>
@endsection
