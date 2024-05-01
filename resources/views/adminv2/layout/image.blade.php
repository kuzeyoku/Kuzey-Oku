@extends(themeView('admin', 'layout.main'))
@push('style')
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/dropzone.min.css') }}" type="text/css" />
@endpush
@push('script')
    <script src="{{ themeAsset('admin', 'js/dropzone.js') }}"></script>
@endpush
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.image")</h4>
                    <h6>@lang("admin/{$folder}.image_description")</h6>
                </div>
            </div>

            {!! Form::open([
                'url' => route("admin.{$route}.imageAllDelete", $item),
                'method' => 'delete',
                'class' => 'd-inline',
            ]) !!}
            <a href="javascript:void(0);" class="btn btn-danger destroy-btn">{{ __('admin/general.all_delete') }}</a>
            {!! Form::close() !!}
        </div>
        <div class="card">
            <div class="card-body">
                {!! Form::open([
                    'url' => route("admin.{$route}.imageStore"),
                    'class' => 'dropzone mb-3',
                    'file' => true,
                ]) !!}
                @yield('form')
                {!! Form::close() !!}
                <div class="row">
                    @foreach ($item->getMedia("images") as $image)
                        <div class="col-md-2">
                            <div class="p-2 border rounded position-relative mb-4">
                                <img src="{{ $image->getUrl() }}" class="img-fluid">
                                {!! Form::open([
                                    'url' => route("admin.{$route}.imageDelete", $image),
                                    'method' => 'delete',
                                    'class' => 'd-inline',
                                ]) !!}
                                <button type="button"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 destroy-btn">{{ __('admin/general.delete') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
