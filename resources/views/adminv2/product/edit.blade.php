@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $product])
@section('form')
    {{ Html::file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default->file', $product->getFirstMediaUrl($module->COVER_COLLECTION()))->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }}
            {{ Form::text("title[$lang->code]", $product->titles[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) }}
            {{ Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", $product->descriptions[$lang->code] ?? null, [
                'class' => 'editor',
            ]) }}
            {{ Form::label("features[$lang->code]", __("admin/{$folder}.form_features")) }}
            {{ Form::textarea("features[$lang->code]", $product->features[$lang->code] ?? null, [
                'class' => 'form-control',
                'rows' => 4,
                'placeholder' => __("admin/{$folder}.form_features_placeholder"),
            ]) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label('category_id', __("admin/{$folder}.form_category")) }}
            {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('video', __("admin/{$folder}.form_video")) }}
            {{ Form::text('video', $product->video, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', $product->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Form::select('status', statusList(), $product->status, ['class' => 'form-control']) }}
        </div>
    </div>
@endsection
