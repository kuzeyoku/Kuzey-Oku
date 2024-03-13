@extends(themeView('admin', 'layout.create'))
@section('form')
    @foreach (LanguageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane mb-3 @if ($loop->first) active show @endif">
            {!! Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
            {!! Form::text("title[$lang->code]", null, [
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
                'class' => 'form-control',
            ]) !!}
            {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", null, ['class' => 'editor']) !!}
        </div>
    @endforeach
    {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
    {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
@endsection
