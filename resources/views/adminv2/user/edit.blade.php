@extends(themeView('admin', 'layout.edit'), ['tab' => false, 'item' => $user])
@section('form')
    {{ Form::label('name', __("admin/{$folder}.form_name")) }}
    {{ Form::text('name', $user->name, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_name_placeholder"),
    ]) }}
    {{ Form::label('email', __("admin/{$folder}.form_email")) }}
    {{ Form::email('email', $user->email, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_email_placeholder"),
    ]) }}
    {{ Form::label('password', __("admin/{$folder}.form_password")) }}
    {{ Form::password('password', [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_password_placeholder"),
    ]) }}
    {{ Form::label('role', __("admin/{$folder}.form_role")) }}
    {{ Form::select('role', $roles, $user->role->value, ['class' => 'form-control']) }}
@endsection
