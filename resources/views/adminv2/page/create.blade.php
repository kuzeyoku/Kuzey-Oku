@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]")->placeholder(__("admin/{$folder}.form_title"))->class('form-control') }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]")->class('editor') }}
        </div>
    @endforeach
    {{ Html::label(__('admin/general.status')) }}
    {{ Html::select('status', statusList())->class('form-control') }}
@endsection
