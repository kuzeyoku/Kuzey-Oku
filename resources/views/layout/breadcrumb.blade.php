<section class="page-title" style="background-image: url({{ asset('assets/images/page-title.jpg') }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">@yield('title')</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                @hasSection('parent_title')
                    <li><a href="@yield('parent_url')">@yield('parent_title')</a></li>
                @endif
                <li>@yield('title')</li>
            </ul>
        </div>
    </div>
</section>
