@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang('admin/setting.recaptcha')</h6>
            </div>
            {{ Html::label(__('admin/setting.recaptcha_status')) }}
            {{ Html::select(
                'recaptcha_status',
                App\Enums\StatusEnum::getOnOffSelectArray(),
                config('setting.recaptcha.status'),
            )->class('form-control') }}
            {{ Html::label(__('admin/setting.recaptcha_site_key')) }}
            {{ Html::text('recaptcha_site_key', config('setting.recaptcha.site_key'))->placeholder(__('admin/setting.recaptcha_site_key_placeholder'))->class('form-control') }}
            {{ Html::label(__('admin/setting.recaptcha_secret_key')) }}
            {{ Html::text('recaptcha_secret_key', config('setting.recaptcha.secret_key'))->placeholder(__('admin/setting.recaptcha_secret_key_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang('admin/setting.analytics')</h6>
            </div>
            {{ Html::label(__('admin/setting.google_analytics_status')) }}
            {{ Html::select(
                'analytics_status',
                App\Enums\StatusEnum::getOnOffSelectArray(),
                config('setting.google_analytics.status'),
            )->class('form-control') }}
            {{ Html::label(__('admin/setting.google_analytics_code')) }}
            {{ Html::textarea('code', config('setting.google_analytics.code'))->placeholder(__('admin/setting.google_analytics_code_placeholder'))->class('form-control')->rows(3) }}
        </div>
    </div>
@endsection
