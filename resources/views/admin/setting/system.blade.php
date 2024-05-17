@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__("admin/{$folder}.system_admin_route")) }}
    {{ html()->text('admin_route', config('setting.system.admin_route'))->placeholder(__("admin/{$folder}.system_admin_route_placeholder"))->class('form-control') }}
    <div class="alert alert-warning">@lang("admin/{$folder}.system_admin_route_alert")</div>
@endsection
