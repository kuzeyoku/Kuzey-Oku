@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ auth()->user()->name }}</h4>
                        <h5>@lang('admin/home.welcome', ['ip' => $userData->ip, 'location' => $userData->city ?? null, 'country' => $userData->country ?? null])</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $visits->count() }}</h4>
                        <h5>@lang('admin/home.unique_visits')</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="users"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $visits->sum('visit_count') }}</h4>
                        <h5>@lang('admin/home.page_views')</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>170</h4>
                        <h5>Sales Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4 log-card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">@lang('admin/home.info_logs')</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($infoLogs as $message)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ $message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4 log-card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">@lang('admin/home.error_logs')</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($errorLogs as $message)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ $message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
