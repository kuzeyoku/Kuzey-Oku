@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.comment_title")</h4>
                    <h6>@lang("admin/{$folder}.comment_description")</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route("admin.{$route}.create") }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>@lang("admin/{$folder}.create")</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>{{ __("admin/{$folder}.comment_table_post") }}</th>
                                <th>{{ __("admin/{$folder}.comment_table_name") }}</th>
                                <th>{{ __("admin/{$folder}.comment_table_mail") }}</th>
                                <th>{{ __("admin/{$folder}.comment_table_comment") }}</th>
                                <th>{{ __('admin/general.table_created_at') }}</th>
                                <th>{{ __('admin/general.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->post->titles[config('app.fallback_locale')] }}</td>
                                    <td>{{ Str::limit($item->name, 20) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ Str::limit($item->comment, 50) }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->status != App\Enums\StatusEnum::Active->value)
                                            {{ Form::open([
                                                'url' => route("admin.{$route}.comment_approve", $item),
                                                'method' => 'PUT',
                                                'class' => 'd-inline',
                                            ]) }}
                                            <button type="submit" class="btn btn-success">@lang('admin/general.approve')</button>
                                            {{ Form::close() }}
                                        @endif
                                        {!! Form::open([
                                            'url' => route("admin.{$route}.comment_delete", $item),
                                            'method' => 'delete',
                                            'class' => 'd-inline',
                                        ]) !!}
                                        <a href="javascript:void(0);"
                                            class="btn btn-danger destroy-btn">@lang('admin/general.delete')</a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('admin/general.table_no_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $items->links(themeView('admin', 'layout.pagination')) }}
            </div>
        </div>
    </div>
@endsection
