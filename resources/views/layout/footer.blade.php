<footer class="main-footer">
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <div class="footer-column col-xl-3 col-lg-12 col-md-12">
                    <div class="footer-widget about-widget">
                        <div class="logo"><a href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo.png') }}"></a>
                        </div>
                        <div class="text">{{ config('setting.general.description') }}</div>
                        <ul class="social-icon-two">
                            @foreach (config('setting.social', []) as $key => $value)
                                @if ($value)
                                    <li>
                                        <a href="{{ $value }}"><i class="fab fa-{{ $key }}"></i></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                    <div class="footer-widget links-widget">
                        <h6 class="widget-title">@lang('front/footer.txt1')</h6>
                        <ul class="user-links">
                            @foreach ($pages as $page)
                                <li><a href="{{ $page->url }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4 col-sm-8">
                    <div class="footer-widget gallery-widget">
                        <h6 class="widget-title">@lang('front/footer.txt2')</h6>
                        <div class="widget-content">
                            <div class="outer clearfix">
                                @foreach ($services as $service)
                                    <figure class="image">
                                        <a href="{{ $service->url }}">
                                            <img src="{{ $service->getFirstMediaUrl('cover', 'thumbnail') }}"
                                                alt="{{ $service->title }}">
                                        </a>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                    <div class="footer-widget contacts-widget">
                        <h6 class="widget-title">@lang('front/footer.txt3')</h6>
                        <div class="text">{{ config('setting.contact.address') }}</div>
                        <ul class="contact-info">
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ config('setting.contact.email') }}">
                                    <span class="__cf_email__">{{ config('setting.contact.email') }}</span>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-phone-square"></i>
                                <a href="tel:{{ config('setting.contact.phone') }}">
                                    {{ config('setting.contact.phone') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-container">
                <div class="copyright-text">@lang('front/footer.txt4', ['year' => date('Y'), 'title' => config('setting.general.title'), 'url' => '#', 'author' => 'Babazan Software'])</a>
                </div>
            </div>
        </div>
    </div>
</footer>
