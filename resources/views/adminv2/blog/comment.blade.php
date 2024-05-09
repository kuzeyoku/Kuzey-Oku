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
                                    <td class="table-action">
                                        <div class="data-action-button">
                                            @if ($item->status != App\Enums\StatusEnum::Active->value)
                                                {{ Form::open([
                                                    'url' => route("admin.{$route}.comment_approve", $item),
                                                    'method' => 'PUT',
                                                    'class' => 'd-inline',
                                                ]) }}
                                                <button class="me-2 p-2" type="submit"><i data-feather="check-circle"
                                                        class="feather-icon text-success"></i></button>
                                                {{ Form::close() }}
                                            @endif
                                            <a class="me-2 p-2" data-bs-toggle="modal" href="javascript:void(0);"
                                                data-bs-target="#{{ 'comment-' . $item->id }}">
                                                <i data-feather="eye" class="feather-icon"></i>
                                            </a>

                                            <div class="modal fade" id="comment-{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0 custom-modal-header">
                                                            <div class="page-title">
                                                                <h4>Yorum Detayları</h4>
                                                            </div>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                <li class="p-2 border mb-2">
                                                                    <b>Yorumu Yapan : </b>{{ $item->name }}
                                                                    ({{ $item->email }})
                                                                </li>
                                                                <li class="p-2 border mb-2">
                                                                    <b>Yorum : </b>{{ $item->comment }}
                                                                </li>
                                                            </ul>
                                                            <div class="modal-footer-btn">
                                                                <button type="button" class="btn btn-cancel me-2"
                                                                    data-bs-dismiss="modal">Kapat</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::open([
                                                'url' => route("admin.{$route}.comment_delete", $item),
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
                </div>
                {{ $items->links(themeView('admin', 'layout.pagination')) }}
            </div>
        </div>
    </div>
@endsection
