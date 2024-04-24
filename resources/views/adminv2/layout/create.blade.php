@extends(themeView('admin', 'layout.main'))
@section('pageTitle', __("admin/{$folder}.create"))
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
                @if ($tab)
                    @include(themeView('admin', 'layout.langtab'))
                @endif
                {!! Html::form('POST', route("admin.{$route}.store"))->open() !!}
                @if ($tab)
                    <div class="tab-content">
                        @yield('form')
                    </div>
                @else
                    @yield('form')
                @endif
                {!! Html::submit(__('admin/general.save'))->class('btn btn-primary') !!}
                {!! Html::form()->close() !!}
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/dropify.min.css') }}">
@endpush
@push('script')
    <script src="{{ themeAsset('admin', 'js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/dropzone.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/dropify.min.js') }}"></script>
@endpush
