@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    @php
        $formElementList = ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin'];
    @endphp
    @foreach ($formElementList as $element)
        {!! Form::label($element, __('admin/setting.social_' . $element)) !!}
        {!! Form::text("{$element}", config('setting.social.' . $element), [
            'class' => 'form-control',
            'placeholder' => __("admin/{$folder}.social_{$element}_placeholder"),
        ]) !!}
    @endforeach
@endsection
