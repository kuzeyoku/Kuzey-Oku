    @extends(themeView('admin', 'setting.main'))
    @section('setting_form')
        {{ Form::label('status', __('admin/setting.caching_status')) }}
        {{ Form::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.caching.status'), ['class' => 'form-control']) }}
        {{ Form::label('time', __('admin/setting.caching_time')) }}
        {{ Form::text('time', config('setting.caching.time'), [
            'class' => 'form-control',
            'placeholder' => __('admin/setting.caching_time_placeholder'),
        ]) }}
    @endsection
