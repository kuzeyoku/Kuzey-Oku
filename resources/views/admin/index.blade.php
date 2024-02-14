@extends('admin.layout.main')
@section('pageTitle', __('admin/home.title'))
@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ Auth::user()->name }}</h4>
                    <h5>{{ __('admin/home.welcome', ['ip' => request()->ip()]) }}</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-user')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="dash-counts">
                    @if ($messages > 0)
                        <h4>{{ $messages }}</h4>
                        <h5>{{ __('admin/home.unread_messages') }} - <a class="text-white"
                                href="{{ route('admin.message.index') }}"><strong
                                    class="text-danger">{{ __('admin/home.go_messages') }}</strong></a></h5>
                    @else
                        <h5>{{ __('admin/home.no_unread_messages') }}</h5>
                    @endif
                </div>
                <div class="dash-imgs">
                    @svg('far-envelope')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    @if ($comments > 0)
                        <h4>{{ $comments }}</h4>
                        <h5>{{ __('admin/home.pending_approval_comments') }} - <a class="text-white"
                                href="{{ route('admin.blog.comments') }}"><strong
                                    class="text-danger">{{ __('admin/home.go_comments') }}</strong></a></h5>
                    @else
                        <h5>{{ __('admin/home.no_pending_approval_comments') }}</h5>
                    @endif
                </div>
                <div class="dash-imgs">
                    @svg('far-comment-alt')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>{{ $visits->where('updated_at', '>=', now()->subMinutes(5))->count('ip_address') }}</h4>
                    <h5>Son 5 Dakikada Aktif Olan Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-users')
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count bg-secondary">
                <div class="dash-counts">
                    <h4>Tekil : {{ $visits->where('updated_at', '>=', now()->startOfDay())->count('ip_address') }} |
                        Çoğul : {{ $visits->where('updated_at', '>=', now()->startOfDay())->sum('visit_count') }}</h4>
                    <h5>Bugün Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-users')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count bg-secondary">
                <div class="dash-counts">
                    <h4>Tekil : {{ \App\Models\Visitor::getOnlineUsers() }} |
                        Çoğul : 15</h4>
                    <h5>Bu Hafta Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-users')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count bg-secondary">
                <div class="dash-counts">
                    <h4>{{ \App\Models\Visitor::getOnlineUsers() }}</h4>
                    <h5>Bu Ay Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-users')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count bg-secondary">
                <div class="dash-counts">
                    <h4>{{ \App\Models\Visitor::getOnlineUsers() }}</h4>
                    <h5>Tüm Zamanlar Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('fas-users')
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('card')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <h3 class="card-title">{{ __('admin/home.visitor_records') }}</h3>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.updatevisitorcounter') }}"
                            class="btn btn-success btn-sm">{{ __('admin/home.update') }}</a>
                        {!! Form::open(['url' => route('admin.clearvisitorcounter')], ['method' => 'post']) !!}
                        <button type="button" class="btn btn-danger btn-sm logclean">{{ __('admin/home.clear') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>


                <div class="card-body">
                    <ul class="overflow-auto visit-log-list">
                        <li>
                            Bugün toplam <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfDay())->count('ip_address') }}</strong>
                            tekil, <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfDay())->sum('visit_count') }}</strong>
                            çoğul ziyaret gerçekleşti.
                        </li>
                        <li>
                            Bu hafta toplam <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfWeek())->count() }}</strong>
                            tekil, <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfWeek())->sum('visit_count') }}</strong>
                            çoğul ziyaret gerçekleşti.
                        </li>
                        <li>
                            Bu ay toplam <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfMonth())->count() }}</strong>
                            tekil, <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfMonth())->sum('visit_count') }}</strong>
                            çoğul ziyaret gerçekleşti.
                        </li>
                        <li>
                            Bu yıl toplam <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfYear())->count() }}</strong>
                            tekil, <strong
                                class="text-black">{{ $visits->where('updated_at', '>=', now()->startOfYear())->sum('visit_count') }}</strong>
                            çoğul ziyaret gerçekleşti.
                        </li>
                        <li>
                            Tüm zamanlar toplam <strong class="text-black">{{ $visits->count() }}</strong>
                            tekil, <strong class="text-black">{{ $visits->sum('visit_count') }}</strong>
                            çoğul ziyaret gerçekleşti.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <h3 class="card-title">{{ __('admin/home.transaction_records') }}</h3>
                    {!! Form::open(['url' => route('admin.logclean')], ['method' => 'post']) !!}
                    {!! Form::hidden('file', 'info') !!}
                    <button type="button" class="btn btn-danger btn-sm logclean">{{ __('admin/home.clear') }}</button>
                    {!! Form::close() !!}
                </div>
                <div class="card-body">
                    <ul class="overflow-auto info-log-list">
                        @forelse (array_reverse($infoLogs) as $log)
                            <li>{{ $log }}</li>
                        @empty
                            <li>{{ __('admin/home.no_log_records') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <h3 class="card-title">{{ __('admin/home.error_logs') }}</h3>
                    {!! Form::open(['url' => route('admin.logclean')], ['method' => 'post']) !!}
                    {!! Form::hidden('file', 'errors') !!}
                    <button type="button" class="btn btn-danger btn-sm logclean">{{ __('admin/home.clear') }}</button>
                    {!! Form::close() !!}
                </div>
                <div class="card-body">
                    <ul class="overflow-auto error-log-list">
                        @forelse (array_reverse($errorLogs) as $log)
                            <li>{{ $log }}</li>
                        @empty
                            <li>{{ __('admin/home.no_log_records') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endSection
