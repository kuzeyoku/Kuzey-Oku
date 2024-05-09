@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}

    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }}
            {{ Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) }}
            {{ Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", null, ['class' => 'editor']) }}
            {{ Form::label("features[$lang->code]", __("admin/{$folder}.form_features")) }}
            {{ Form::textarea("features[$lang->code]", null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => __("admin/{$folder}.form_features_placeholder")]) }}
        </div>
    @endforeach
    {{ Form::label('category_id', __("admin/{$folder}.form_category")) }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label('video', __("admin/{$folder}.form_video")) }}
            {{ Form::text('video', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('model3D', __("admin/{$folder}.form_model3D")) }}
            {{ Form::text('model3D', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_model3D_placeholder"),
            ]) }}
        </div>
    </div>
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
