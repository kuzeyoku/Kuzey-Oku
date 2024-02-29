@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="setting-title">
        <h4>Genel Ayarlar</h4>
    </div>
    {{ Form::open(['url' => route('admin.setting.update')]) }}
    {{ Form::label(__('admin/setting.general_title')) }}
    {{ Form::text('title', config('setting.general.title'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_title_placeholder')]) }}
    {{ Form::label(__('admin/setting.general_description')) }}
    {{ Form::textarea('description', config('setting.general.description'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_description_placeholder'), 'rows' => 3]) }}
    {{ Form::label(__('admin/setting.general_keywords')) }}
    {{ Form::text('keywords', config('setting.general.keywords'), ['class' => 'form-control', 'placeholder' => __('admin/setting.general_keywords')]) }}
    <div class="text-end settings-bottom-btn">
        <button type="button" class="btn btn-cancel me-2">Cancel</button>
        <button type="submit" class="btn btn-submit">Save Changes</button>
    </div>
    {{ Form::close() }}
@endsection
