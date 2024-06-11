<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>{{ config('setting.sitemap.home_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.home_priority') }}</priority>
    </url>
    <url>
        <loc>{{ url(route(\App\Enums\ModuleEnum::Service->route() . '.index')) }}</loc>
        <changefreq>{{ config('setting.sitemap.service_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.service_priority') }}</priority>
    </url>
    <url>
        <loc>{{ url(route(\App\Enums\ModuleEnum::Project->route() . '.index')) }}</loc>
        <changefreq>{{ config('setting.sitemap.project_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.project_priority') }}</priority>
    </url>
    <url>
        <loc>{{ url(route(\App\Enums\ModuleEnum::Product->route() . '.index')) }}</loc>
        <changefreq>{{ config('setting.sitemap.product_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.product_priority') }}</priority>
    </url>
    <url>
        <loc>{{ url(route(\App\Enums\ModuleEnum::Blog->route() . '.index')) }}</loc>
        <changefreq>{{ config('setting.sitemap.blog_changefreq') }}</changefreq>
        <priority>{{ config('setting.sitemap.blog_priority') }}</priority>
    </url>
    @foreach ($services as $service)
        <url>
            <loc>{{ url($service->url) }}</loc>
            <changefreq>{{ config('setting.sitemap.service_detail_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.service_detail_priority') }}</priority>
        </url>
    @endforeach
    @foreach ($projects as $project)
        <url>
            <loc>{{ url($project->url) }}</loc>
            <changefreq>{{ config('setting.sitemap.project_detail_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.project_detail_priority') }}</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>{{ url($product->url) }}</loc>
            <changefreq>{{ config('setting.sitemap.product_detail_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.product_detail_priority') }}</priority>
        </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>{{ url($post->url) }}</loc>
            <changefreq>{{ config('setting.sitemap.blog_detail_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.blog_detail_priority') }}</priority>
        </url>
    @endforeach
    @foreach ($pages as $page)
        <url>
            <loc>{{ url(route('page.show', [$page, $page->slug])) }}</loc>
            <lastmod>{{ $page->updated_at->format('Y-m-d') }}</lastmod>
            <changefreq>{{ config('setting.sitemap.static_pages_changefreq') }}</changefreq>
            <priority>{{ config('setting.sitemap.static_pages_priority') }}</priority>
        </url>
    @endforeach
</urlset>
