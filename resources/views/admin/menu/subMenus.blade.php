<ul class="submenu">
    @foreach ($menu->subMenu as $subMenu)
        <li class="d-flex flex-row justify-content-between align-center">
            <div>
                <a>{{ $subMenu->title }}</a>
            </div>
            <div>
                <a href="{{ route("admin.{$folder}.edit", $subMenu) }}" class="btn btn-sm btn-primary">
                    {{ __('admin/general.edit') }}
                </a>
                {{ Form::open([
                    'url' => route("admin.{$route}.destroy", $subMenu),
                    'method' => 'delete',
                    'class' => 'd-inline',
                ]) }}
                <a href="javascript:void(0);" class="btn btn-sm btn-danger destroy-btn">
                    {{ __('admin/general.delete') }}
                </a>
                {{ Form::close() }}
            </div>
        </li>
        @if ($subMenu->subMenu)
            @include(themeView('admin', "{$folder}.subMenus"), ['menu' => $subMenu])
        @endif
    @endforeach
</ul>
