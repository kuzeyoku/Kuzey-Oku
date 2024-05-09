@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="card-title-head">
        <h6>@lang('admin/setting.recaptcha')</h6>
    </div>
    {{ Form::label('recaptcha_status', __('admin/setting.recaptcha_status')) }}
    {{ Form::select(
        'recaptcha_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.recaptcha.status'),
        [
            'class' => 'form-control',
        ],
    ) }}
    {{ Form::label('recaptcha_site_key', __('admin/setting.recaptcha_site_key')) }}
    {{ Form::text('recaptcha_site_key', config('setting.recaptcha.site_key'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.recaptcha_site_key_placeholder'),
    ]) }}
    {{ Form::label('recaptcha_secret_key', __('admin/setting.recaptcha_secret_key')) }}
    {{ Form::text('recaptcha_secret_key', config('setting.recaptcha.secret_key'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.recaptcha_secret_key_placeholder'),
    ]) }}
    <div class="card-title-head mt-5">
        <h6>Google Analytics</h6>
    </div>
    {{ Form::label('analytics_status', __('admin/setting.google_analytics_status')) }}
    {{ Form::select(
        'analytics_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.google_analytics.status'),
        [
            'class' => 'form-control',
        ],
    ) }}
    {{ Form::label('code', __('admin/setting.google_analytics_code')) }}
    {{ Form::textarea('code', config('setting.google_analytics.code'), [
        'class' => 'form-control',
        'rows' => 3,
        'placeholder' => __('admin/setting.google_analytics_code_placeholder'),
    ]) }}
@endsection
