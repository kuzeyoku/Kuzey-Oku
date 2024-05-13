@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__('admin/setting.system_admin_route')) }}
    {{ html()->text('admin_route', config('setting.system.admin_route'))->placeholder(__('admin/setting.system_admin_route_placeholder'))->class('form-control') }}
    <div class="alert alert-warning">Bu ayarı değiştirdikten sonra önbelleği temizleyin ve yeni url ile devam edin.</div>
@endsection
