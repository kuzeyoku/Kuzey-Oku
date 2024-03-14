    <div class="edit-delete-action">
        <a class="me-2 p-2" target="_blank" href="{{ $item->url }}">
            <i data-feather="eye" class="feather-eye"></i>
        </a>
        <a class="me-2 p-2" href="{{ route("admin.{$route}.image", $item) }}" class="btn btn-image">
            <i data-feather="image" class="feather-image"></i>
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
