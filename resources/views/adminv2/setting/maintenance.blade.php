@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {!! Form::label('status', __('admin/setting.maintenance_status')) !!}
    {!! Form::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.maintenance.status'), [
        'class' => 'form-control',
    ]) !!}
    {!! Form::label('message', __('admin/setting.maintenance_message')) !!}
    {!! Form::textarea('message', config('setting.maintenance.message'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.maintenance_message_placeholder'),
    ]) !!}
    {!! Form::label('end_date', __('admin/setting.maintenance_end_date')) !!}
    {!! Form::date('end_date', config('setting.maintenance.end_date'), ['class' => 'form-control']) !!}
@endsection
