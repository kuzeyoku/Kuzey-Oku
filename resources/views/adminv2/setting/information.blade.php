@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Form::label('cookie_notification_status', __('admin/setting.information_cookie_notification_status')) }}
    {{ Form::select(
        'cookie_notification_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.information.cookie_notification_status'),
        ['class' => 'form-control'],
    ) }}
    @php
        $formElementList = [
            'cookie_policy_page',
            'user_agreement_page',
            'privacy_agreement_page',
            'kvkk_page',
            'about_page',
            'faq_page',
        ];
    @endphp
    @foreach ($formElementList as $element)
        {{ Form::label($element, __('admin/setting.information_' . $element)) }}
        {{ Form::select($element, App\Models\Page::toSelectArray(), config('setting.information.' . $element), [
            'class' => 'form-control',
            'placeholder' => __('admin/general.select'),
        ]) }}
    @endforeach
@endsection
