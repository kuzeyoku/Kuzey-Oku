@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content settings-content">
        <div class="page-header settings-pg-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Site Ayarları</h4>
                    <h6>Manage your settings on portal</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    @foreach (App\Enums\SettingCategoryEnum::cases() as $tab)
                        @if ($tab->status())
                            <a class="nav-link @if ($loop->first) active @endif mb-2 border"
                                data-bs-toggle="pill" href="#{{ $tab->value }}" role="tab" aria-selected="true">
                                @svg($tab->icon()) {{ $tab->title() }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="tab-content">
                    @foreach (App\Enums\SettingCategoryEnum::cases() as $content)
                        @if ($content->status())
                            <div class="tab-pane fade @if ($loop->first) active show @endif"
                                id="{{ $content->value }}" role="tabpanel">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h5 class="card-title">{{ $content->title() }}</h5>
                                    </div>
                                    <div class="card-body">
                                        {!! Form::open(['url' => route("admin.{$route}.update"), 'method' => 'PUT', 'files' => true]) !!}
                                        @include("admin.{$folder}." . $content->value)
                                        {!! Form::hidden('category', $content->value) !!}
                                        {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ themeAsset('admin', 'plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ themeAsset('admin', 'plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
@endpush
