@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ Html::label('status', __('admin/setting.maintenance_status')) }}
    {{ Html::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.maintenance.status'), [
        'class' => 'form-control',
    ]) }}
    {{ Html::label('message', __('admin/setting.maintenance_message')) }}
    {{ Html::textarea('message', config('setting.maintenance.message'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.maintenance_message_placeholder'),
    ]) }}
    {{ Html::label('end_date', __('admin/setting.maintenance_end_date')) }}
    {{ Html::date('end_date', config('setting.maintenance.end_date'), ['class' => 'form-control']) }}
@endsection
