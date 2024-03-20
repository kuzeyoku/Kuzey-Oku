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
    <button class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-category">Add New Category</button>
    <div class="modal fade" id="add-category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Create Category</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="category-list.html">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Slug</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-0">
                                    <div
                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                        <span class="status-label">Status</span>
                                        <input type="checkbox" id="user2" class="check" checked="">
                                        <label for="user2" class="checktoggle"></label>
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Create Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
