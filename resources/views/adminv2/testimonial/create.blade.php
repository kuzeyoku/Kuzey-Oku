@extends(themeView('admin', 'layout.create'), ['tab' => false])
@section('form')
    {!! Form::label('name', __("admin/{$folder}.form_name")) !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_name_placeholder"),
    ]) !!}
    {!! Form::label('company', __("admin/{$folder}.form_company")) !!}
    {!! Form::text('company', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_company_placeholder"),
    ]) !!}
    {!! Form::label('position', __("admin/{$folder}.form_position")) !!}
    {!! Form::text('position', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_position_placeholder"),
    ]) !!}
    {!! Form::label('message', __("admin/{$folder}.form_message")) !!}
    {!! Form::textarea('message', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_message_placeholder"),
    ]) !!}
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', 0, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
