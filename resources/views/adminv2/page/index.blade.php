@extends(themeView('admin', 'layout.main'))
@section('pageTitle', __("admin/{$folder}.list"))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang("admin/{$folder}.title")</h4>
                    <h6>@lang("admin/{$folder}.description")</h6>
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
                                <th>ID</th>
                                <th>Başlık</th>
                                <th>Durum</th>
                                <th>Oluşturuldu</th>
                                <th>Güncellendi</th>
                                <th class="no-sort">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        {{ statusView($item->status) }}
                                    </td>
                                    <td>
                                        {{ $item->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $item->updated_at->diffForHumans() }}
                                    </td>
                                    @include('adminv2.layout.action')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
