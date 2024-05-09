@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row mb-3">
        <div class="col-lg-6">
            {{ Form::label('folder', __('admin/setting.image_folder')) }}
            {{ Form::text('folder', config('setting.image.folder'), [
                'class' => 'form-control',
                'placeholder' => __('admin/setting.image_folder_placeholder'),
            ]) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('max_size', __('admin/setting.image_max_size')) }}
            {{ Form::number('max_size', config('setting.image.max_size'), [
                'class' => 'form-control',
                'placeholder' => __('admin/setting.image_max_size_placeholder'),
            ]) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('quality', __('admin/setting.image_quality')) }}
            {{ Form::number('quality', config('setting.image.quality'), [
                'class' => 'form-control',
                'placeholder' => __('admin/setting.image_quality_placeholder'),
            ]) }}
        </div>
    </div>
@endsection
