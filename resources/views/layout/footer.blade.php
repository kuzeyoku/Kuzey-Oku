<footer class="main-footer">
    <div class="bg bg-pattern-9"></div>
    {{-- <div class="auto-container">
        <div class="subscribe-form">
            <div class="title-column">
                <h5 class="title"><i class="icon flaticon-open-envelope"></i> Subscribe now to get <br>latest
                    updates</h5>
            </div>
            <div class="form-column">
                <form method="post" action="#">
                    <div class="form-group">
                        <input type="email" name="email" class="email" value="" placeholder="Email Address"
                            required="">
                        <button type="button" class="theme-btn"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">

                <div class="footer-column col-xl-3 col-lg-12 col-md-12">
                    <div class="footer-widget about-widget">
                        <div class="logo"><a href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                        </div>
                        <div class="text">{{ config('setting.general.description') }}</div>
                        <ul class="social-icon-two">
                            @foreach (config('setting.social', []) as $key => $value)
                                @if ($value)
                                    <li><a href="{{ $value }}"><i class="fab fa-{{ $key }}"></i></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                    <div class="footer-widget links-widget">
                        <h6 class="widget-title">Bağlantılar</h6>
                        <ul class="user-links">
                            @foreach ($pages as $page)
                                <li><a href="{{ $page->url }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4 col-sm-8">
                    <div class="footer-widget gallery-widget">
                        <h6 class="widget-title">Hizmetlerimiz</h6>
                        <div class="widget-content">
                            <div class="outer clearfix">
                                <figure class="image">
                                    <a href="#"><img
                                            src="{{ asset('assets/images/resource/project-thumb-1.jpg') }}"
                                            alt=""></a>
                                </figure>
                                <figure class="image">
                                    <a href="#"><img
                                            src="{{ asset('assets/images/resource/project-thumb-2.jpg') }}"
                                            alt=""></a>
                                </figure>
                                <figure class="image">
                                    <a href="#"><img
                                            src="{{ asset('assets/images/resource/project-thumb-3.jpg') }}"
                                            alt=""></a>
                                </figure>
                                <figure class="image">
                                    <a href="#"><img
                                            src="{{ asset('assets/images/resource/project-thumb-4.jpg') }}"
                                            alt=""></a>
                                </figure>
                                <figure class="image">
                                    <a href="#"><imgw
                                            src="{{ asset('assets/images/resource/project-thumb-5.jpg') }}"
                                            alt=""></a>
                                </figure>
                                <figure class="image">
                                    <a href="#"><img
                                            src="{{ asset('assets/images/resource/project-thumb-6.jpg') }}"
                                            alt=""></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                    <div class="footer-widget contacts-widget">
                        <h6 class="widget-title">İletişim</h6>
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
                <div class="copyright-text">&copy; Copyright reserved by <a href="{{ route('home') }}">Babazan
                        Software</a>
                </div>
            </div>
        </div>
    </div>
</footer>
