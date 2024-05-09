@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $blog])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default->file', $blog->getFirstMediaUrl($module->COVER_COLLECTION()))->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]", $blog->titles[$lang->code] ?? null)->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]", $blog->descriptions[$lang->code] ?? null)->class('editor') }}
            {{ Html::label(__("admin/{$folder}.form_tags")) }}
            {{ Html::text("tags[$lang->code]", $blog->tags[$lang->code] ?? null)->placeholder(__("admin/{$folder}.form_tags_placeholder"))->class('form-control') }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Html::label(__("admin/{$folder}.form_category")) }}
            {{ Html::select('category_id', $categories, $blog->category_id)->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', $blog->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList(), $blog->status)->class('form-control') }}

        </div>
    </div>
@endsection
