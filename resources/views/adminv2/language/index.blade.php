@extends(themeView('admin', 'layout.list'))
@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>{{ __("admin/{$folder}.table_title") }}</th>
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
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                    <td>{{ $item->status_view }}</td>
                    <td class="table-action">
                        <div class="data-action-button">
                            <a class="me-2 p-2" href="{{ route("admin.{$route}.files", $item) }}">
                                <i data-feather="repeat" class="feather-icon text-primary"></i>
                            </a>
                            <a class="me-2 p-2" href="{{ route("admin.{$route}.edit", $item) }}">
                                <i data-feather="edit" class="feather-icon text-success"></i>
                            </a>
                            {{ Form::open([
                                'url' => route("admin.{$route}.destroy", $item),
                                'method' => 'delete',
                                'class' => 'd-inline',
                            ]) }}
                            <a class="destroy-btn p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-icon text-danger"></i>
                            </a>
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">{{ __('admin/general.table_no_data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
