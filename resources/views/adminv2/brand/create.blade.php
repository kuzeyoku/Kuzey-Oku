@extends(themeView('admin', 'layout.create'))
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify',
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    <br>
    {!! Form::label('title', __("admin/{$folder}.form_title")) !!}
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_title_placeholder"),
    ]) !!}
    {!! Form::label('url', __("admin/{$folder}.form_url")) !!}
    {!! Form::text('url', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_url_placeholder"),
    ]) !!}
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', 0, ['class' => 'form-control', 'placeholder' => __('admin/general.order')]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
