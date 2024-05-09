@extends(themeView('admin', 'layout.edit'), ['tab' => false, 'item' => $brand])
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify-image',
        'data-default-file' => $brand->getFirstMediaUrl($module->COVER_COLLECTION()),
        'data-allowed-file-extensions' => 'png jpg jpeg gif',
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    <br>
    {!! Form::label('title', __("admin/{$folder}.form_title")) !!}
    {!! Form::text('title', $brand->title, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_title_placeholder"),
    ]) !!}
    {!! Form::label('url', __("admin/{$folder}.form_url")) !!}
    {!! Form::text('url', $brand->url, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_url_placeholder"),
    ]) !!}
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', $brand->order, ['class' => 'form-control']) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), $brand->status, ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
