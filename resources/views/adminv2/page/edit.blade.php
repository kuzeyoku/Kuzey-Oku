@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $page])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]", $page->titles[$lang->code] ?? null)->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]", $page->descriptions[$lang->code] ?? null)->class('editor') }}
        </div>
    @endforeach
    {{ Html::label(__('admin/general.status')) }}
    {{ Html::select('status', statusList(), $page->status)->class('form-control') }}
@endsection
