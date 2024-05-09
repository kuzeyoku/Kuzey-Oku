@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Form::label('admin', __('admin/setting.pagination_admin')) }}
    {{ Form::number('admin', config('setting.pagination.admin'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.pagination_admin_placeholder'),
    ]) }}
    {{ Form::label('front', __('admin/setting.pagination_front')) }}
    {{ Form::number('front', config('setting.pagination.front'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.pagination_front_placeholder'),
    ]) }}
@endsection
