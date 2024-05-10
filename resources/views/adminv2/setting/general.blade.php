@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Html::label(__('admin/setting.general_title')) }}
    {{ Html::text('title', config('setting.general.title'))->placeholder(__('admin/setting.general_title_placeholder'))->class('form-control') }}
    {{ Html::label(__('admin/setting.general_description')) }}
    {{ Html::textarea('description', config('setting.general.description'))->placeholder(__('admin/setting.general_description_placeholder'))->class('form-control') }}
    {{ Html::label(__('admin/setting.general_keywords')) }}
    {{ Html::text('keywords', config('setting.general.keywords'))->placeholder(__('admin/setting.general_keywords_placeholder'))->class('form-control') }}
@endsection
