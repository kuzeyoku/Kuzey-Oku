@extends(themeView('admin', 'layout.main'))
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.edit")</h4>
                    <h6>@lang("admin/{$folder}.edit_description")</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route("admin.{$route}.index") }}" class="btn btn-added"><i data-feather="list"
                        class="me-2"></i>@lang("admin/{$folder}.list")</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @include(themeView('admin', 'layout.langtab'))
                {!! Form::open(['url' => route("admin.{$route}.update", $page), 'method' => 'PUT']) !!}
                <div class="tab-content">
                    @foreach (LanguageList() as $key => $lang)
                        <div id="{{ $lang->code }}"
                            class="tab-pane mb-3 @if ($loop->first) active show @endif">
                            {!! Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
                            {!! Form::text("title[$lang->code]", $page->titles[$lang->code] ?? null, [
                                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
                                'class' => 'form-control',
                            ]) !!}
                            {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
                            {!! Form::textarea("description[$lang->code]", $page->descriptions[$lang->code] ?? null, ['class' => 'editor']) !!}
                        </div>
                    @endforeach
                    {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
                    {!! Form::select('status', statusList(), $page->status, ['class' => 'form-control']) !!}
                    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
