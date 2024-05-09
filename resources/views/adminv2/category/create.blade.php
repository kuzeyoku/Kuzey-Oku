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
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label(__("admin/{$folder}.form_module")) }}
            {{ Html::select('module', $modules)->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__("admin/{$folder}.form_parent")) }}
            {{ Html::select('parent', $categories)->class('form-control') }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', 0)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList())->class('form-control') }}
        </div>
    </div>
@endsection
