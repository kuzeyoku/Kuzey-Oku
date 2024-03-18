@extends(themeView('admin', 'layout.main'), ['tab' => false, 'item' => $language])
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.create")</h4>
                    <h6>@lang("admin/{$folder}.create_description")</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route("admin.{$route}.index") }}" class="btn btn-added"><i data-feather="list"
                        class="me-2"></i>@lang("admin/{$folder}.list")</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::open(['url' => route("admin.{$route}.update", $language), 'method' => 'put']) !!}
                {!! Form::label('title', __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
                {!! Form::text('title', $language->title, [
                    'class' => 'form-control',
                    'placeholder' => __("admin/{$folder}.form_title_placeholder"),
                ]) !!}
                {!! Form::label('code', __("admin/{$folder}.form_code")) !!} <span class="manitory">*</span>
                {!! Form::text('code', $language->code, [
                    'class' => 'form-control',
                    'placeholder' => __("admin/{$folder}.form_code_placeholder"),
                ]) !!}
                {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
                {!! Form::select('status', statusList(), $language->status, ['class' => 'form-control']) !!}
                {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
