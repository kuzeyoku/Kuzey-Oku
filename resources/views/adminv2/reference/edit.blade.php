@extends(themeView('admin', 'layout.edit'), ['tab' => false, 'item' => $reference])
@section('content')
    {!! Form::file('image', [
        'class' => 'dropify-image',
        'data-default-file' => $reference->getFirtsMediaUrl($module->COVER_COLLECTION()),
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    <br>
    {!! Form::label('url', __("admin/{$folder}.form_url")) !!}
    {!! Form::text('url', $reference->url, [
        'class' => 'form-control',
        'placeholder' => "admin/{$folder}.form_url_placeholder",
    ]) !!}
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', $reference->order, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) !!}
        </div>

        <div class="col-lg-6">
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), $reference->status, ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
