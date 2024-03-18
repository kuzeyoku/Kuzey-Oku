<td class="action-table-data">
    <div class="edit-delete-action">
        @isset($show)
            <a class="me-2 p-2" target="_blank" href="{{ $item->url }}">
                <i data-feather="eye" class="feather-eye"></i>
            </a>
        @endisset
        @isset($image)
            <a class="me-2 p-2" href="{{ route("admin.{$route}.image", $item) }}" class="btn btn-image">
                <i data-feather="image" class="feather-image"></i>
            </a>
        @endisset
        @isset($comment)
            <a class="me-2 p-2" href="{{ route("admin.{$route}.comment", $item) }}" class="btn btn-image">
                <i data-feather="message-square" class="feather-comment"></i>
            </a>
        @endisset
        @isset($edit)
            <a class="me-2 p-2" href="{{ route("admin.{$folder}.edit", $item) }}">
                <i data-feather="edit" class="feather-edit"></i>
            </a>
        @endisset
        @isset($delete)
            {!! Form::open([
                'url' => route("admin.{$route}.destroy", $item),
                'method' => 'delete',
                'class' => 'd-inline',
            ]) !!}
            <a class="destroy-btn p-2" href="javascript:void(0);">
                <i data-feather="trash-2" class="feather-trash-2"></i>
            </a>
            {!! Form::close() !!}
        @endisset
    </div>
</td>
