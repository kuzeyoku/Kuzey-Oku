    @extends(themeView('admin', 'setting.main'))
    @section('setting_form')
        {{ html()->label(__('admin/setting.caching_status')) }}
        {{ html()->select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.caching.status'))->class('form-control') }}
        {{ html()->label(__('admin/setting.caching_time')) }}
        {{ html()->text('time', config('setting.caching.time'))->placeholder(__('admin/setting.caching_time_placeholder'))->class('form-control') }}
    @endsection
