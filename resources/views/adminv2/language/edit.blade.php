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
                {{ Html::Form('PUT', route("admin.{$route}.update", $language))->open() }}
                {{ Html::label(__("admin/{$folder}.form_title")) }}
                {{ Html::text('title', $language->title)->placeholder("admin/{$folder}.form_title_placeholder")->class('form-control') }}
                {{ Html::label('code', __("admin/{$folder}.form_code")) }}
                {{ Html::text('code', $language->code)->placeholder("admin/{$folder}.form_code_placeholder")->class('form-control') }}
                {{ Html::label(__('admin/general.status')) }}
                {{ Html::select('status', statusList(), $language->status)->class('form-control') }}
                {{ Html::submit(__('admin/general.save'))->class('btn btn-primary') }}
                {{ Html::Form()->close() }}
            </div>
        </div>
    </div>
@endsection
