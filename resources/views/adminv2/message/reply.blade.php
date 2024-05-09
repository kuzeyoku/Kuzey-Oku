@extends(themeView('admin', 'layout.main'))
@section('pageTitle', __("admin/{$folder}.reply"))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.show_title")</h4>
                    <h6>@lang("admin/{$folder}.show_description")</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route("admin.{$route}.index") }}" class="btn btn-added"><i data-feather="list"
                        class="me-2"></i>@lang("admin/{$folder}.list")</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['url' => route("admin.{$route}.sendReply", $message), 'method' => 'post']) }}
                {{ Form::hidden('message_id', $message->id) }}
                {{ Form::label('email', __("admin/{$folder}.form_customer")) }}
                {{ Form::text('email', $message->email, ['class' => 'form-control', 'readonly' => '']) }}
                {{ Form::label('subject', __("admin/{$folder}.form_subject")) }}
                {{ Form::text('subject', 're:' . $message->subject, ['class' => 'form-control']) }}
                {{ Form::label('message', __("admin/{$folder}.form_content")) }}
                {{ Form::textarea('message', null, ['class' => 'form-control']) }}
                {{ Form::submit(__("admin/{$folder}.form_send"), ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
