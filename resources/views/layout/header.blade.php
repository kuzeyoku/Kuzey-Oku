<header class="main-header header-style-one">

    <div class="header-top">
        <div class="inner-container">
            <div class="top-left">

                <ul class="list-style-one">
                    <li><i class="fa fa-envelope"></i> <a href=""><span
                                class="__cf_email__">[email&#160;protected]</span></a>
                    </li>
                    <li><i class="fa fa-map-marker"></i> 88 Broklyn Golden Street. New York</li>
                </ul>
            </div>
            <div class="top-right">
                <ul class="useful-links">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="social-icon-one">
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-lower">
        <div class="container-fluid">

            <div class="main-box">
                <div class="logo-box">
                    <div class="logo"><a href="index.html.htm"><img src="images/logo.png" alt=""
                                title="Tronis"></a></div>
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
                    <a href="tel:+92(8800)9806" class="info-btn">
                        <i class="icon fa fa-phone"></i>
                        <small>Call Anytime</small>+ 88 ( 9800 ) 6802-00
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
                <div class="nav-logo"><a href="index.html.htm"><img src="images/logo.png" alt=""
                            title=""></a></div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix">

            </ul>
            <ul class="contact-list-one">
                <li>

                    <div class="contact-info-box">
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <a href="tel:+92880098670">+92 (8800) - 98670</a>
                    </div>
                </li>
                <li>

                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">Send Email</span>
                        <a href="/cdn-cgi/l/email-protection#4b232e273b0b2824263b2a253265282426"><span
                                class="__cf_email__"
                                data-cfemail="6e060b021e2e0d01031e0f0017400d0103">[email&#160;protected]</span></a>
                    </div>
                </li>
                <li>

                    <div class="contact-info-box">
                        <span class="icon lnr-icon-clock"></span>
                        <span class="title">Send Email</span>
                        Mon - Sat 8:00 - 6:30, Sunday - CLOSED
                    </div>
                </li>
            </ul>
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </nav>
    </div>

    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times"></span></button>
        <div class="search-inner">
            <form method="post" action="blog-showcase.html">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Search..." required="">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>


    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">

                <div class="logo">
                    <a href="index.html.htm" title=""><img src="images/logo-2.png" alt=""
                            title=""></a>
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
