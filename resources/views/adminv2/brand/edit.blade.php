@extends(themeView('admin', 'layout.edit'), ['tab' => false, 'item' => $brand])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default->file', $brand->getFirstMediaUrl($module->COVER_COLLECTION()))->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    <br>
    {{ Html::label(__("admin/{$folder}.form_title")) }}
    {{ Html::text('title', $brand->title)->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
    {{ Html::label(__("admin/{$folder}.form_url")) }}
    {{ Html::text('url', $brand->url)->placeholder(__("admin/{$folder}.form_url_placeholder"))->class('form-control') }}
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', $brand->order)->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList(), $brand->status)->class('form-control') }}
        </div>
    </div>
@endsection
