@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__("admin/{$folder}.maintenance_status")) }}
    {{ html()->select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.maintenance.status'))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.maintenance_message")) }}
    {{ html()->textarea('message', config('setting.maintenance.message'))->placeholder(__("admin/{$folder}.maintenance_message_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.maintenance_end_date")) }}
    {{ html()->date('end_date', config('setting.maintenance.end_date'))->class('form-control') }}
@endsection
