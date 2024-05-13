@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__('admin/setting.pagination_admin')) }}
    {{ html()->number('admin', config('setting.pagination.admin'))->placeholder(__('admin/setting.pagination_admin_placeholder'))->class('form-control') }}
    {{ html()->label(__('admin/setting.pagination_front')) }}
    {{ html()->number('front', config('setting.pagination.front'))->placeholder(__('admin/setting.pagination_front_placeholder'))->class('form-control') }}
@endsection
