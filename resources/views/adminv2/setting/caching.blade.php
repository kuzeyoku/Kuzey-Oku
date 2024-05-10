    @extends(themeView('admin', 'setting.main'))
    @section('setting_form')
        {{ Html::label(__('admin/setting.caching_status')) }}
        {{ Html::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.caching.status'))->class('form-control') }}
        {{ Html::label(__('admin/setting.caching_time')) }}
        {{ Html::text('time', config('setting.caching.time'))->placeholder(__('admin/setting.caching_time_placeholder'))->class('form-control') }}
    @endsection
