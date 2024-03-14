@extends(themeView('admin', 'layout.edit'), ['item' => $page])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
            {!! Form::text("title[$lang->code]", $page->titles[$lang->code] ?? null, [
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
                'class' => 'form-control',
            ]) !!}
            {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", $page->descriptions[$lang->code] ?? null, ['class' => 'editor']) !!}
        </div>
    @endforeach
    {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
    {!! Form::select('status', statusList(), $page->status, ['class' => 'form-control']) !!}
@endsection
