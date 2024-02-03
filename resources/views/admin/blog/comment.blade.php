@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.comments"))
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap table-bordered table-center mb-0">
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
                        <td>{{ $item->post->title }}</td>
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
                                <button type="submit" class="btn btn-success">@svg('fas-check')</button>
                                {{ Form::close() }}
                            @endif
                            {!! Form::open([
                                'url' => route("admin.{$route}.comment_delete", $item),
                                'method' => 'delete',
                                'class' => 'd-inline',
                            ]) !!}
                            <button type="button" class="btn btn-delete destroy-btn">@svg('fas-times')</button>
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
    {{ $items->render('admin.layout.pagination') }}
@endsection
