@extends(themeView('admin', 'layout.create'), ['tab' => false])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    <br>
    {{ Html::label(__("admin/{$folder}.form_title")) }}
    {{ Html::text('title')->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
    {{ Html::label(__("admin/{$folder}.form_url")) }}
    {{ Html::text('url')->placeholder(__("admin/{$folder}.form_url_placeholder"))->class('form-control') }}
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
