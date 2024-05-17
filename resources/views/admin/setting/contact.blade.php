@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__("admin/{$folder}.contact_phone")) }}
    {{ html()->text('phone', config('setting.contact.phone'))->placeholder(__("admin/{$folder}.contact_phone_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_emai")) }}
    {{ html()->text('email', config('setting.contact.email'))->placeholder(__("admin/{$folder}.contact_email_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_address")) }}
    {{ html()->text('address', config('setting.contact.address'))->placeholder(__("admin/{$folder}.contact_address_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_map")) }}
    {{ html()->text('map', config('setting.contact.map'))->placeholder(__("admin/{$folder}.contact_map_placeholder"))->class('form-control') }}
@endsection
