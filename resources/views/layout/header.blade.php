<header class="main-header header-style-one">
    <div class="header-top">
        <div class="inner-container">
            <div class="top-left">
                <ul class="list-style-one">
                    <li>
                        @svg('far-envelope', 'icon-space')
                        <a href="mailto:{{ settings('contact.mail') }}">
                            <span class="__cf_email__">{{ settings('contact.email') }}</span>
                        </a>
                    </li>
                    <li>@svg('fas-map-marker-alt', 'icon-space'){{ settings('contact.address') }}</li>
                </ul>
            </div>
            <div class="top-right">
                @if (settings('system.multilanguage', App\Enums\Statusenum::Passive->value) == App\Enums\StatusEnum::Active->value)
                    {{ html()->form()->route('language.set')->open() }}
                    {{ html()->select('locale', languageList()->pluck('title', 'code'), session()->get('locale'))->class('lang-select') }}
                    {{ html()->form()->close() }}
                @endif
                <ul class="social-icon-one">
                    <?php
                    $social = ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin'];
                    ?>
                    @foreach ($social as $key => $value)
                        @if ($value)
                            <a href="{{ settings("social.{$key}") }}">@svg('fab-' . $value, 'text-white icon-space')</a>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="header-lower">
        <div class="container-fluid">
            <div class="main-box">
                <div class="logo-box">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ themeAsset('front', 'images/logo.png') }}"
                                alt="{{ settings('general.title', env('APP_NAME')) }}">
                        </a>
                    </div>
                </div>
                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation">
                            @foreach ($headerMenu as $menu)
                                @if ($menu->parent_id === 0)
                                    @if ($menu->subMenu->count() > 0)
                                        @include('layout.menu', ['menu' => $menu])
                                    @else
                                        <li class="{{ $menu->subMenu->count() > 0 ? 'dropdown' : '' }}">
                                            <a href="{{ $menu->url }}">{{ $menu->title }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="outer-box">
                    <a href="{{ route('contact.index') }}" class="info-btn">
                        <i class="icon">@svg('far-envelope', 'text-white')</i>
                        <span>@lang('front/header.txt1')</span>
                    </a>

                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img
                            src="{{ themeAsset('front', 'images/logo.png') }}"></a></div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="contact-list-one">
                <li>
                    <div class="contact-info-box">
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">@lang('front/header.txt2')</span>
                        <a href="tel:{{ settings('contact.phone') }}">{{ settings('contact.phone') }}</a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">@lang('front/header.txt3')</span>
                        <a href="mailto:{{ settings('contact.phone') }}"><span
                                class="__cf_email__">{{ settings('contact.email') }}</span></a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-map"></span>
                        <span class="title">@lang('front/header.txt4')</span>
                        {{ settings('contact.address') }}
                    </div>
                </li>
            </ul>
            <ul class="social-links">
                @foreach ($social as $item)
                    @if (settings("social.{$item}"))
                        <li>
                            <a href="{{ settings('social.' . $item) }}">
                                @svg('fab-' . $item)
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <div class="logo">
                    <a href="{{ route('home') }}" title="">
                        <img src="{{ themeAsset('front', 'images/logo-2.png') }}"
                            alt="{{ settings('general.title', env('APP_NAME')) }}">
                    </a>
                </div>
                <div class="nav-outer">
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
    </div>
</header>
