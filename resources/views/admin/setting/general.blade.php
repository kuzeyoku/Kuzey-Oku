@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__('admin/setting.general_title')) }}
    {{ html()->text('title', config('setting.general.title'))->placeholder(__('admin/setting.general_title_placeholder'))->class('form-control') }}
    {{ html()->label(__('admin/setting.general_description')) }}
    {{ html()->textarea('description', config('setting.general.description'))->placeholder(__('admin/setting.general_description_placeholder'))->class('form-control') }}
    {{ html()->label(__('admin/setting.general_keywords')) }}
    {{ html()->text('keywords', config('setting.general.keywords'))->placeholder(__('admin/setting.general_keywords_placeholder'))->class('form-control') }}
@endsection
