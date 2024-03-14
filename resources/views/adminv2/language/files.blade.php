@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.files_title")</h4>
                    <h6>@lang("admin/{$folder}.files_description")</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route("admin.{$route}.index") }}" class="btn btn-added"><i data-feather="list"
                        class="me-2"></i>@lang("admin/{$folder}.list")</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                        {!! Form::hidden('folder', 'admin') !!}
                        {!! Form::label(__("admin/{$folder}.form_admin_files")) !!}
                        {!! Form::select('filename', $adminFiles, $dir == 'admin' ? $filename : 'default', [
                            'class' => 'form-control',
                            'placeholder' => __('admin/general.select'),
                            'onchange' => 'this.form.submit()',
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-lg-6">
                        {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                        {!! Form::hidden('folder', 'front') !!}
                        {!! Form::label(__("admin/{$route}.form_site_files")) !!}
                        {!! Form::select('filename', $frontFiles, $dir == 'front' ? $filename : 'default', [
                            'class' => 'form-control',
                            'placeholder' => __('admin/general.select'),
                            'onchange' => 'this.form.submit()',
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __("admin/{$folder}.files_title") }}</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url' => route("admin.{$route}.updateFileContent", $language), 'method' => 'put']) !!}
                {!! Form::hidden('filename', $filename) !!}
                {!! Form::hidden('folder', $dir) !!}
                <table class="table table-responsive mb-3">
                    <tbody>
                        @forelse ($fileContent as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>
                                    {!! Form::text($key, $value, ['class' => 'form-control mb-0']) !!}
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-primary mb-0 text-center">
                                {{ __("admin/{$folder}.files_table_empty") }}
                            </div>
                        @endforelse
                    </tbody>
                </table>
                @if (!empty($fileContent))
                    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
