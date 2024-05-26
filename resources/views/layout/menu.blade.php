<li class="{{ $menu->subMenu->count() > 0 :? 'dropdown' }}">
    <a href="{{ $menu->url ?? '#' }}">{{ $menu->title }}</a>
    <ul class="sub-menu">
        @foreach ($menu->subMenu as $subMenu)
            @if ($subMenu->subMenu->count() > 0)
                @include('layout.menu', ['menu' => $subMenu])
            @else
                <li><a href="{{ $subMenu->url }}">{{ $subMenu->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
