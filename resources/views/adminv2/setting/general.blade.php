@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Form::label('title', __('admin/setting.general_title')) }}
    {{ Form::text('title', config('setting.general.title'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_title_placeholder')]) }}
    {{ Form::label('description', __('admin/setting.general_description')) }}
    {{ Form::textarea('description', config('setting.general.description'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_description_placeholder'), 'rows' => 3]) }}
    {{ Form::label('keywords', __('admin/setting.general_keywords')) }}
    {{ Form::text('keywords', config('setting.general.keywords'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_keywords')]) }}
@endsection
