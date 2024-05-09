@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]")->placeholder(__("admin/{$folder}.form_title"))->class('form-control') }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]")->class('editor') }}
            {{ Html::label(__("admin/{$folder}.form_tags")) }}
            {{ Html::text("tags[$lang->code]")->placeholder(__("admin/{$folder}.form_tags_placeholder"))->class('form-control') }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Html::label(__("admin/{$folder}.form_category")) }}
            {{ Html::select('category_id', $categories)->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', 0)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList())->class('form-control') }}
        </div>
    </div>
@endsection
