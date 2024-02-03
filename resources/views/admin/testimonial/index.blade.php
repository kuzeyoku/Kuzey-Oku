@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.list"))
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap table-bordered table-center mb-0">
            <thead>
                <tr>
                    <th>#ID</th>
                    {{-- <th>{{ __("admin/{$folder}.table_image") }}</th> --}}
                    <th>{{ __("admin/{$folder}.table_name") }}</th>
                    <th>{{ __("admin/{$folder}.table_company") }}</th>
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
                        {{-- <td><img class="table_image" src="{{ uploadFolder($folder, $item->image) }}"></td> --}}
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->company }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>{{ statusView($item->status) }}</td>
                        <td>@include('admin.layout.action')</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('admin/general.table_no_data') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $items->render('admin.layout.pagination') }}
@endsection
