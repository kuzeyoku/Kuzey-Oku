<td class="action-table-data">
    <div class="edit-delete-action">
        <a class="me-2 edit-icon  p-2" href="{{ $item->url }}">
            <i data-feather="eye" class="feather-eye"></i>
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
