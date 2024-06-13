@if (settings('seo.index') == App\Enums\StatusEnum::Passive->value)
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endif
@if (settings('seo.open_graph') != App\Enums\StatusEnum::Passive->value)
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="https://example.com/open-graph-image.jpg">
    <meta property="og:url" content="https://example.com/page">
    <meta property="og:site_name" content="{{ settings('general.title') }}">
    <meta property="og:type" content="website">
@endif
@if (settings('seo.twitter_card') != App\Enums\StatusEnum::Passive->value)
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="https://example.com/twitter-card-image.jpg">
@endif
@if (settings('seo.schema') != App\Enums\StatusEnum::Passive->value)
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{{ env("APP_URL") }}",
            "logo": "{{ asset("storage/logo/header-logo.png") }}",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "{{ config("setting.contact.phone") }}",
                "contactType": "customer service"
            }],
            @if (config("setting.social"))
    "sameAs": [
    @foreach (config("setting.social") as $social)
        @if($social)
            "{{ $social }}",
        @endif
    @endforeach
    ]
    @endif
    }
    </script>
@endif
