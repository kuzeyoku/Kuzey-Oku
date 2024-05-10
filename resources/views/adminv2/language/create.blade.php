@extends(themeView('admin', 'layout.main'))
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
                {{ html()->form('POST', route("admin.{$route}.store"))->open() }}
                {{ html()->label(__("admin/{$folder}.form_title")) }}
                {{ html()->text('title')->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
                {{ html()->label('code', __("admin/{$folder}.form_code")) }}
                {{ html()->text('code')->placeholder(__("admin/{$folder}.form_code_placeholder"))->class('form-control') }}
                {{ html()->label(__('admin/general.status')) }}
                {{ html()->select('status', statusList())->class('form-control') }}
                {{ html()->submit(__('admin/general.save'))->class('btn btn-primary') }}
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
