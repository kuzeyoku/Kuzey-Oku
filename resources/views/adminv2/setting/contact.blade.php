@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Html::label(__('admin/setting.contact_phone')) }}
    {{ Html::text('phone', config('setting.contact.phone'))->placeholder(__('admin/setting.contact_phone_placeholder'))->class('form-control') }}
    {{ Html::label(__('admin/setting.contact_email')) }}
    {{ Html::text('email', config('setting.contact.email'))->placeholder(__('admin/setting.contact_email_placeholder'))->class('form-control') }}
    {{ Html::label(__('admin/setting.contact_address')) }}
    {{ Html::text('address', config('setting.contact.address'))->placeholder(__('admin/setting.contact_address_placeholder'))->class('form-control') }}
    {{ Html::label(__('admin/setting.contact_map')) }}
    {{ Html::text('map', config('setting.contact.map'))->placeholder(__('admin/setting.contact_map_placeholder'))->class('form-control') }}
@endsection
