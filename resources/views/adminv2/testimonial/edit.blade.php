@extends('admin.layout.main', ['tab' => false, 'item' => $testimonial])
@section('form')
    {{ Html::label(__("admin/{$folder}.form_name")) }}
    {{ Html::text('name', $testimonial->name)->placeholder(__("admin/{$folder}.form_name_placeholder"))->class('form-control') }}
    {{ Html::label(__("admin/{$folder}.form_company")) }}
    {{ Html::text('company', $testimonial->company)->placeholder(__("admin/{$folder}.form_company_placeholder"))->class('form-control') }}
    {{ Html::label(__("admin/{$folder}.form_position")) }}
    {{ Html::text('position', $testimonial->position)->placeholder(__("admin/{$folder}.form_position_placeholder"))->class('form-control') }}
    {{ Html::label(__("admin/{$folder}.form_message")) }}
    {{ Html::textarea('message', $testimonial->message)->placeholder(__("admin/{$folder}.form_message_placeholder"))->class('form-control') }}
    <div class="row">
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.order')) }}
            {{ Html::number('order', $testimonial->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Html::label(__('admin/general.status')) }}
            {{ Html::select('status', statusList(), $testimonial->status)->class('form-control') }}
        </div>
    </div>
@endsection
