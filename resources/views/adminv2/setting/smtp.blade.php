@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    @php
        $formElementList = [
            'host',
            'port',
            'username',
            'password',
            'encryption',
            'from_address',
            'from_name',
            'reply_address',
        ];
    @endphp

    @foreach ($formElementList as $element)
        {{ Form::label($element, __('admin/setting.smtp_' . $element)) }}
        {{ Form::text("{$element}", config('setting.smtp.' . $element), [
            'class' => 'form-control',
            'placeholder' => __("admin/{$folder}.smtp_{$element}_placeholder"),
        ]) }}
    @endforeach
@endsection
