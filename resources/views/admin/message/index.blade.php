@extends(themeView('admin', 'layout.list'))
@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>{{ __("admin/{$folder}.table_name") }}</th>
                <th>{{ __("admin/{$folder}.table_subject") }}</th>
                <th>{{ __('admin/general.table_created_at') }}</th>
                <th>{{ __('admin/general.table_updated_at') }}</th>
                <th>{{ __('admin/general.table_status') }}</th>
                <th>{{ __('admin/general.table_action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                    <td>{!! $item->status_view !!}</td>
                    <td class="action-table-data">
                        <div class="edit-delete-action">
                            <a class="me-2 edit-icon p-2" href="{{ route("admin.{$route}.show", $item) }}">
                                <i data-feather="eye" class="feather-eye"></i>
                            </a>
                            {{ Form::open([
                                'url' => route("admin.{$route}.destroy", $item),
                                'method' => 'delete',
                                'class' => 'd-inline',
                            ]) }}
                            <a class="destroy-btn p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">{{ __('admin/general.table_no_data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
