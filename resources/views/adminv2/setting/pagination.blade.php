@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Html::label('admin', __('admin/setting.pagination_admin')) }}
    {{ Html::number('admin', config('setting.pagination.admin'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.pagination_admin_placeholder'),
    ]) }}
    {{ Html::label('front', __('admin/setting.pagination_front')) }}
    {{ Html::number('front', config('setting.pagination.front'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.pagination_front_placeholder'),
    ]) }}
@endsection
