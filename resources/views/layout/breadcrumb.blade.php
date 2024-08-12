<section class="page-title" style="background-image: url({{ $themeAsset->breadcrumb }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">@yield('title', settings('general.title'))</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">@lang('front/breadcrumb.txt1')</a></li>
                @isset($parent)
                    <li><a href="@yield('parent_url')">@yield('parent_title')</a></li>
                @endisset
                <li>@yield('title')</li>
            </ul>
        </div>
    </div>
</section>
