@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang('admin/setting.title')</h4>
                    <h6>@lang('admin/setting.description')</h6>
                </div>
            </div>
        </div>
        {{ Html::Form('PUT', route('admin.setting.update'))->open() }}
        {{ Html::hidden('category', request()->category) }}
        <div class="card">
            <div class="card-header">
                <h4>@lang('admin/setting.category_' . request()->category)</h4>
            </div>
            <div class="card-body">
                @yield('setting_form')
            </div>
        </div>
        {{ Html::submit(__('admin/general.save'))->class('btn btn-submit') }}
        {{ Html::Form()->close() }}
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/dropify.min.css') }}">
@endpush
@push('script')
    <script src="{{ themeAsset('admin', 'js/dropzone.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/dropify.min.js') }}"></script>
@endpush
