@extends(themeView('admin', 'layout.create'), ['tab' => false])
@section('form')
    {{ Form::label('name', __("admin/{$folder}.form_name")) }}
    {{ Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_name_placeholder"),
    ]) }}
    {{ Form::label('company', __("admin/{$folder}.form_company")) }}
    {{ Form::text('company', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_company_placeholder"),
    ]) }}
    {{ Form::label('position', __("admin/{$folder}.form_position")) }}
    {{ Form::text('position', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_position_placeholder"),
    ]) }}
    {{ Form::label('message', __("admin/{$folder}.form_message")) }}
    {{ Form::textarea('message', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_message_placeholder"),
    ]) }}
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', 0)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ html()->label(__('admin/general.status')) }}
            {{ html()->select('status', statusList())->class('form-control') }}
        </div>
    </div>
@endsection
