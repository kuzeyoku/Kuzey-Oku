@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $category])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]", $category->titles[$lang->code] ?? null)->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
            {{ Html::label("description[$lang->code]", __("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]", $category->descriptions[$lang->code] ?? null)->class('editor') }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label('module', __("admin/{$folder}.form_module")) }}
            {{ Html::select('module', $modules, $category->module)->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label('parent', __("admin/{$folder}.form_parent")) }}
            {{ Html::select('parent', $categories, $category->parent_id)->class('form-control') }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', $category->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList(), $category->status)->class('form-control') }}
        </div>
    </div>
@endsection
