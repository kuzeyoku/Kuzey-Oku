<header class="main-header header-style-one">
    <div class="header-top">
        <div class="inner-container">
            <div class="top-left">
                <ul class="list-style-one">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:{{ config('setting.contact.mail') }}">
                            <span class="__cf_email__">{{ config('setting.contact.email') }}</span>
                        </a>
                    </li>
                    <li><i class="fa fa-map-marker"></i>{{ config('setting.contact.address') }}</li>
                </ul>
            </div>
            <div class="top-right">
                @if (config('setting.system.multilanguage', App\Enums\Statusenum::Passive->value) == App\Enums\StatusEnum::Active->value)
                    {{ html()->form()->route('language.set')->open() }}
                    {{ html()->select('locale', languageList()->pluck('title', 'code'), session()->get('locale'))->class('lang-select') }}
                    {{ html()->form()->close() }}
                @endif
                <ul class="social-icon-one">
                    @foreach (config('setting.social', []) as $key => $value)
                        @if ($value)
                            <li><a href="{{ $value }}"><span class="fab fa-{{ $key }}"></span></a></li>
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
                                alt="{{ config('setting.general.title', env('APP_NAME')) }}">
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
                    <div class="ui-btn-outer">
                        <button class="ui-btn ui-btn search-btn">
                            <span class="icon lnr lnr-icon-search"></span>
                        </button>
                    </div>
                    <a href="{{ route('contact.index') }}" class="info-btn">
                        <i class="icon fa fa-envelope"></i>
                        <span>@lang('front/contact.txt1')</span>
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
                        <span class="title">Telefon</span>
                        <a href="tel:{{ config('setting.contact.phone') }}">{{ config('setting.contact.phone') }}</a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">Email</span>
                        <a href="mailto:{{ config('setting.contact.phone') }}"><span
                                class="__cf_email__">{{ config('setting.contact.email') }}</span></a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-map"></span>
                        <span class="title">Adres</span>
                        {{ config('setting.contact.address') }}
                    </div>
                </li>
            </ul>
            <ul class="social-links">
                @foreach (config('setting.social', []) as $key => $value)
                    @if ($value)
                        <li>
                            <a href="{{ $value }}">
                                <i class="fab fa-{{ $key }}"></i>
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
                        <img src="{{ themeAsset('front', 'images/logo-2.png') }}" alt="" title="">
                    </a>
                </div>
                <div class="nav-outer">
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">

                            </ul>
                        </div>
                    </nav>
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
    </div>
</header>
