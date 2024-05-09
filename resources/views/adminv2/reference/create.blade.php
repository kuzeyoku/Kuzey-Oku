@extends(themeView('admin', 'layout.create'), ['tab' => false])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}

    <br>
    {{ Form::label('url', __("admin/{$folder}.form_url")) }}
    {{ Form::text('url', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_url_placeholder"),
    ]) }}
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', 0)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList())->class('form-control') }}
        </div>
    </div>
@endsection
