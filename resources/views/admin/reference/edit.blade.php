@extends(themeView('admin', 'layout.edit'), ['tab' => false, 'item' => $reference])
@section('content')
    {{ html()->file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default->file', $reference->getFirstMediaUrl($module->COVER_COLLECTION()))->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
    <br>
    {{ Form::label('url', __("admin/{$folder}.form_url")) }}
    {{ Form::text('url', $reference->url, [
        'class' => 'form-control',
        'placeholder' => "admin/{$folder}.form_url_placeholder",
    ]) }}
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', $reference->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>

        <div class="col-lg-6">
            {{ html()->label(__('admin/general.status')) }}
            {{ Form::select('status', statusList(), $reference->status, ['class' => 'form-control']) }}
        </div>
    </div>
@endsection
