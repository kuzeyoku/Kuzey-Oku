@extends(themeView('admin', 'layout.list'))
@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>@lang("admin/{$folder}.table_title")</th>
                <th>@lang("admin/{$folder}.table_category")</th>
                <th>@lang('admin/general.table_created_at')</th>
                <th>@lang('admin/general.table_updated_at')</th>
                <th>@lang('admin/general.table_status')</th>
                <th style="width:200px">@lang('admin/general.table_action')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titles[config('app.fallback_locale')] }}</td>
                    <td>{{ $item->category->title ?? __('admin/general.uncategorized') }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                    <td>{!! $item->status_view !!}</td>
                    <td class="action-table-data">
                        <div class="edit-delete-action">
                            <a class="me-2 p-2" target="_blank" href="{{ $item->url }}">
                                <i data-feather="eye" class="feather-eye"></i>
                            </a>
                            <a class="me-2 p-2" href="{{ route("admin.{$route}.comment", $item) }}" class="btn btn-image">
                                <i data-feather="comment" class="feather-comment"></i>
                            </a>
                            <a class="me-2 p-2" href="{{ route("admin.{$folder}.edit", $item) }}">
                                <i data-feather="edit" class="feather-edit"></i>
                            </a>
                            {!! Form::open([
                                'url' => route("admin.{$route}.destroy", $item),
                                'method' => 'delete',
                                'class' => 'd-inline',
                            ]) !!}
                            <a class="destroy-btn p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                            {!! Form::close() !!}
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">@lang('admin/general.table_no_data')</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
