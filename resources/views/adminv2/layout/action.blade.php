<td class="table-action">
    <div class="data-action-button">
        @isset($show)
            <a class="me-2 p-2" target="_blank" href="{{ $item->url }}">
                <i data-feather="eye" class="feather-icon"></i>
            </a>
        @endisset
        @isset($image)
            <a class="me-2 p-2" href="{{ route("admin.{$route}.image", $item) }}">
                <i data-feather="image" class="feather-icon text-secondary"></i>
            </a>
        @endisset
        @isset($comment)
            <a class="me-2 p-2" href="{{ route("admin.{$route}.comment", $item) }}">
                <i data-feather="message-square" class="feather-icon text-info"></i>
            </a>
        @endisset
        @isset($edit)
            <a class="me-2 p-2" href="{{ route("admin.{$folder}.edit", $item) }}">
                <i data-feather="edit" class="feather-icon text-success"></i>
            </a>
        @endisset
        @isset($delete)
            {{ Html::Form('DELETE', route("admin.{$route}.destroy", $item)) }}
            <a class="destroy-btn p-2" href="javascript:void(0);">
                <i data-feather="trash-2" class="feather-icon text-danger"></i>
            </a>
            {{ Html::form()->close() }}
        @endisset
    </div>
</td>
