@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {!! Form::label('phone', __('admin/setting.contact_phone')) !!}
    {!! Form::text('phone', config('setting.contact.phone'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.contact_phone_placeholder'),
    ]) !!}
    {!! Form::label('email', __('admin/setting.contact_email')) !!}
    {!! Form::text('email', config('setting.contact.email'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.contact_email_placeholder'),
    ]) !!}
    {!! Form::label('address', __('admin/setting.contact_address')) !!}
    {!! Form::text('address', config('setting.contact.address'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.contact_address_placeholder'),
    ]) !!}
    {!! Form::label('map', __('admin/setting.contact_map')) !!}
    {!! Form::text('map', config('setting.contact.map'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.contact_map_placeholder'),
    ]) !!}
@endsection
