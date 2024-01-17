<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('setting.general.title'))</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/linear.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tm-bs-mp.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tm-utility-classes.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">

        <div class="preloader"></div>

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
                            <div class="logo"><a href="index.html"><img src="{{ asset('assets/images/logo.png') }}"
                                        alt="" title="Tronis"></a></div>
                        </div>

                        <div class="nav-outer">
                            <nav class="nav main-menu">
                                <ul class="navigation">
                                    <li class="current dropdown"><a href="index.html">Home</a>
                                        <ul>
                                            <li><a href="index.html">Home page 01</a></li>
                                            <li><a href="index-2.html">Home page 02</a></li>
                                            <li><a href="index-3.html">Home page 03</a></li>
                                            <li class="dropdown"><a href="#">Single</a>
                                                <ul>
                                                    <li><a href="index-1-single.html">Home Single 1</a></li>
                                                    <li><a href="index-2-single.html">Home Single 2</a></li>
                                                    <li><a href="index-3-single.html">Home Single 3</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Dark</a>
                                                <ul>
                                                    <li><a href="index-1-dark.html">Home Dark 1</a></li>
                                                    <li><a href="index-2-dark.html">Home Dark 2</a></li>
                                                    <li><a href="index-3-dark.html">Home Dark 3</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Boxed</a>
                                                <ul>
                                                    <li><a href="index-1-boxed.html">Home Boxed 1</a></li>
                                                    <li><a href="index-2-boxed.html">Home Boxed 2</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">RTL</a>
                                                <ul>
                                                    <li><a href="index-1-rtl.html">Home RTL 1</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index.html">Header Style One</a></li>
                                                    <li><a href="index-2.html">Header Style Two</a></li>
                                                    <li><a href="index-3.html">Header Style three</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="page-about.html">About</a></li>
                                            <li class="dropdown"><a href="#">Projects</a>
                                                <ul>
                                                    <li><a href="page-projects.html">Projects List</a></li>
                                                    <li><a href="page-project-details.html">Project Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Team</a>
                                                <ul>
                                                    <li><a href="page-team.html">Team List</a></li>
                                                    <li><a href="page-team-details.html">Team Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="page-testimonial.html">Testimonial</a></li>
                                            <li><a href="page-pricing.html">Pricing</a></li>
                                            <li><a href="page-faq.html">FAQ</a></li>
                                            <li><a href="page-404.html">Page 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="page-services.html">Services List</a></li>
                                            <li><a href="page-service-details.html">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="shop-products.html">Products</a></li>
                                            <li><a href="shop-products-sidebar.html">Products with Sidebar</a></li>
                                            <li><a href="shop-product-details.html">Product Details</a></li>
                                            <li><a href="shop-cart.html">Cart</a></li>
                                            <li><a href="shop-checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">News</a>
                                        <ul>
                                            <li><a href="news-grid.html">News Grid</a></li>
                                            <li><a href="news-details.html">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-contact.html">Get in Touch</a></li>
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
                        <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/images/logo.png') }}"
                                    alt="" title=""></a>
                        </div>
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
                                <a href=""><span class="__cf_email__">[email&#160;protected]</span></a>
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
                            <input type="search" name="search-field" value="" placeholder="Search..."
                                required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">

                        <div class="logo">
                            <a href="index.html" title=""><img src="images/logo-2.png" alt=""
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


        <section class="main-slider">
            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper"
                data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>

                        <li data-index="rs-1" data-transition="zoomout">

                            <img src="{{ asset('assets/images/main-slider/1.jpg') }}" alt=""
                                class="rev-slidebg">
                            <div class="tp-caption" data-paddingbottom="[15,15,15,15]"
                                data-paddingleft="[15,15,15,15]" data-paddingright="[15,15,15,15]"
                                data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text"
                                data-height="none" data-width="['750','750','750','650']" data-whitespace="normal"
                                data-hoffset="['0','0','0','0']" data-voffset="['20','20','0','0']"
                                data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                <h1>Website <span class="style-font color2">&amp;</span> <br>applications <br>design
                                    agency</h1>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[15,15,15,15]"
                                data-paddingright="[15,15,15,15]" data-paddingtop="[0,0,0,0]"
                                data-responsive_offset="on" data-type="text" data-height="none"
                                data-width="['700','750','700','450']" data-whitespace="normal"
                                data-hoffset="['0','0','0','0']" data-voffset="['215','215','215','215']"
                                data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                <a href="page-about.html" class="theme-btn btn-style-one bg-theme-color2"><span
                                        class="btn-title">Explore now</span></a>
                            </div>
                        </li>

                        <li data-index="rs-2" data-transition="zoomout">

                            <img src="{{ asset('assets/images/main-slider/2.jpg') }}" alt=""
                                class="rev-slidebg">
                            <div class="tp-caption" data-paddingbottom="[15,15,15,15]"
                                data-paddingleft="[15,15,15,15]" data-paddingright="[15,15,15,15]"
                                data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text"
                                data-height="none" data-width="['750','750','750','650']" data-whitespace="normal"
                                data-hoffset="['0','0','0','0']" data-voffset="['20','20','0','0']"
                                data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                <h1>Website <span class="style-font color2">&amp;</span> <br>applications <br>design
                                    agency</h1>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[15,15,15,15]"
                                data-paddingright="[15,15,15,15]" data-paddingtop="[0,0,0,0]"
                                data-responsive_offset="on" data-type="text" data-height="none"
                                data-width="['700','750','700','450']" data-whitespace="normal"
                                data-hoffset="['0','0','0','0']" data-voffset="['215','215','215','215']"
                                data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                <a href="page-about.html" class="theme-btn btn-style-one bg-theme-color2"><span
                                        class="btn-title">Explore now</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="about-section">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight"
                        data-wow-delay="600ms">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="sub-title">Get to Know</span>
                                <h2>We provide best design solution in town</h2>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed
                                    do
                                    eiusmod tempor incididunt ut labore et simply free text dolore magna aliqua lonm
                                    andhn.</div>
                            </div>
                            <ul class="list-style-two">
                                <li><i class="fa fa-check-circle"></i> Refresing to get such a personal touch.</li>
                                <li><i class="fa fa-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate.</li>
                                <li><i class="fa fa-check-circle"></i> Velit esse cillum dolore eu fugiat nulla
                                    pariatur.</li>
                            </ul>
                            <div class="btn-box">
                                <a href="tel:+92(8800)9806" class="info-btn">
                                    <i class="icon fa fa-phone"></i>
                                    <small>Call Anytime</small> + 9999 5555 333
                                </a>
                                <a href="page-about.html" class="theme-btn btn-style-one"><span
                                        class="btn-title">Explore now</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInLeft">
                            <figure class="image-1 overlay-anim wow fadeInUp"><img
                                    src="{{ asset('assets/images/resource/about-1.jpg') }}" alt=""></figure>
                            <figure class="image-2 overlay-anim wow fadeInRight"><img
                                    src="{{ asset('assets/images/resource/about-2.jpg') }}" alt=""></figure>
                            <div class="experience bounce-y">
                                <div class="inner">
                                    <i class="icon flaticon-discuss"></i>
                                    <div class="text"><strong>30+</strong> Years of <br>experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="services-section pt-0">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="sub-title">What We’re Offering</span>
                    <h2>Services we’re offering to <br>our customers.</h2>
                </div>
                <div class="row">

                    <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon flaticon-color-sample"></i></div>
                            <h5 class="title"><a href="page-service-details.html">Web designing</a></h5>
                            <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas nunc amet ultrices.
                            </div>
                            <a href="page-service-details.html" class="read-more"><i
                                    class="fa fa-long-arrow-alt-right"></i> Read more</a>
                        </div>
                    </div>

                    <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon flaticon-front-end"></i></div>
                            <h5 class="title"><a href="page-service-details.html">Web development</a></h5>
                            <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas nunc amet ultrices.
                            </div>
                            <a href="page-service-details.html" class="read-more"><i
                                    class="fa fa-long-arrow-alt-right"></i> Read more</a>
                        </div>
                    </div>

                    <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon flaticon-online-shopping"></i></div>
                            <h5 class="title"><a href="page-service-details.html">Web application</a></h5>
                            <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas nunc amet ultrices.
                            </div>
                            <a href="page-service-details.html" class="read-more"><i
                                    class="fa fa-long-arrow-alt-right"></i> Read more</a>
                        </div>
                    </div>
                </div>
                <div class="bottom-box">
                    <div class="text">Trust the experts for all your <strong>web design & development</strong> needs.
                    </div>
                    <a href="page-services.html" class="theme-btn btn-style-one"><span class="btn-title">Explore
                            now</span></a>
                </div>
            </div>
        </section>


        <section class="features-section">
            <div class="bg bg-pattern-1"></div>
            <div class="auto-container">
                <div class="row">

                    <div class="content-column col-xl-5 col-lg-6 col-md-12">
                        <div class="inner-column wow fadeInRight">
                            <div class="sec-title">
                                <span class="sub-title">Welcome to Agency</span>
                                <h2>Experienced designers & developers</h2>
                            </div>
                            <div class="feature-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="icon"><i class="fa fa-check"></i></span>
                                        <h5 class="title">Best user interfaces</h5>
                                        <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas. sapien
                                            nunc amet ultrices</div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="icon"><i class="fa fa-check"></i></span>
                                        <h5 class="title">Smooth development</h5>
                                        <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas. sapien
                                            nunc amet ultrices</div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="icon"><i class="fa fa-check"></i></span>
                                        <h5 class="title">Quality web design</h5>
                                        <div class="text">Tincidunt elit magnis nulla facilisis sags maecenas. sapien
                                            nunc amet ultrices</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="image-column col-xl-7 col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInLeft">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('assets/images/resource/image-2.jpg') }}"
                                        alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="projects-section-two p-0">
            <div class="bg-image" style="background-image: url({{ asset('assets/images/background/2.jpg') }})"></div>
            <div class="auto-container">
                <div class="upper-box">
                    <div class="counter-column">
                        <div class="count-box">
                            <span class="title">Work Completed</span>
                            <div class="numbers">86900+</div>
                        </div>
                    </div>
                    <div class="text-column">
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod
                            tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                </div>
                <div class="sec-title text-center light">
                    <span class="sub-title">Recent Work</span>
                    <h2>Work showcase</h2>
                </div>
                <div class="carousel-outer">
                    <div class="projects-carousel owl-carousel owl-theme">

                        <div class="project-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="page-project-details.html"><img
                                                src="images/resource/project-1.jpg" alt=""></a>
                                    </figure>
                                    <div class="info-box">
                                        <a href="page-project-details.html" class="read-more"><i
                                                class="fa fa-long-arrow-alt-right"></i></a>
                                        <span class="cat">Graphics</span>
                                        <h6 class="title"><a href="page-project-details.html">Digital marketing
                                                web</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="page-project-details.html"><img
                                                src="images/resource/project-2.jpg" alt=""></a>
                                    </figure>
                                    <div class="info-box">
                                        <a href="page-project-details.html" class="read-more"><i
                                                class="fa fa-long-arrow-alt-right"></i></a>
                                        <span class="cat">Graphics</span>
                                        <h6 class="title"><a href="page-project-details.html">Digital marketing
                                                web</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="page-project-details.html"><img
                                                src="images/resource/project-3.jpg" alt=""></a>
                                    </figure>
                                    <div class="info-box">
                                        <a href="page-project-details.html" class="read-more"><i
                                                class="fa fa-long-arrow-alt-right"></i></a>
                                        <span class="cat">Graphics</span>
                                        <h6 class="title"><a href="page-project-details.html">Digital marketing
                                                web</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="page-project-details.html"><img
                                                src="images/resource/project-4.jpg" alt=""></a>
                                    </figure>
                                    <div class="info-box">
                                        <a href="page-project-details.html" class="read-more"><i
                                                class="fa fa-long-arrow-alt-right"></i></a>
                                        <span class="cat">Graphics</span>
                                        <h6 class="title"><a href="page-project-details.html">Digital marketing
                                                web</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="why-choose-us">
            <div class="bg bg-pattern-2"></div>
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight"
                        data-wow-delay="600ms">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="sub-title">Company Benefits</span>
                                <h2>We’re more than an agency</h2>
                                <div class="text">There are many variations of passages of available but the majority
                                    have suffered. Alteration in some form, lipsum is simply free text by injected humou
                                    or randomised words even believable.</div>
                            </div>
                            <blockquote class="blockquote-one">Lorem ipsum dolor sit amet, consectetur notted
                                adipisicing elit sed do eiusmod</blockquote>
                            <div class="btn-box">
                                <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4"
                                    class="play-now-two lightbox-image"><i class="icon fa fa-play"></i> Watch our
                                    <br>few minautes video</a>
                                <a href="page-service-details.html" class="theme-btn btn-style-one"><span
                                        class="btn-title">Explore now</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInLeft">
                            <div class="image-box">
                                <span class="bg-shape"></span>
                                <figure class="image-1 overlay-anim wow fadeInUp"><img
                                        src="images/resource/benefit-1.jpg" alt=""></figure>
                                <figure class="image-2 overlay-anim wow fadeInRight"><img
                                        src="images/resource/benefit-2.jpg" alt=""></figure>
                                <figure class="image-3 overlay-anim wow fadeInRight"><img
                                        src="images/resource/benefit-3.jpg" alt=""></figure>
                                <figure class="logo"><img src="images/resource/fav-icon.png" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="faqs-section">
            <div class="bg bg-pattern-4"></div>
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="sub-title">You’ve have Any Questions?</span>
                    <h2>Frequently asked questions</h2>
                </div>
                <div class="row">

                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <ul class="accordion-box wow fadeInRight">

                                <li class="accordion block active-block">
                                    <div class="acc-btn active">Interdum et malesuada fames ac ante ipsum
                                        <div class="icon fa fa-angle-down"></div>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam
                                                vel.
                                                Vestibulum leo ligula, vit
                                                commodo nisl Sed luctus venenatis pellentesque.</div>
                                        </div>
                                    </div>
                                </li>

                                <li class="accordion block">
                                    <div class="acc-btn">Maecenas condimentum sollicitudin ligula,
                                        <div class="icon fa fa-angle-down"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam
                                                vel.
                                                Vestibulum leo ligula, vit commodo nisl Sed luctus venenatis
                                                pellentesque.</div>
                                        </div>
                                    </div>
                                </li>

                                <li class="accordion block">
                                    <div class="acc-btn">Duis rhoncus orci ut metus rhoncus
                                        <div class="icon fa fa-angle-down"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam
                                                vel.
                                                Vestibulum leo ligula, vit commodo nisl Sed luctus venenatis
                                                pellentesque.</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img src="images/resource/faq.jpg" alt="">
                                </figure>
                            </div>
                            <div class="graph-box">

                                <div class="pie-graph">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgcolor="#ff3838"
                                            data-bgcolor="#f9f9f9" data-width="125" data-height="125"
                                            data-linecap="normal" value="90">
                                        <div class="inner-text count-box"><span class="count-text txt" data-stop="90"
                                                data-speed="2000"></span>%</div>
                                    </div>
                                    <h6 class="title">Affordable <br>cost</h6>
                                </div>

                                <div class="pie-graph">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgcolor="#ff3838"
                                            data-bgcolor="#f9f9f9" data-width="125" data-height="125"
                                            data-linecap="normal" value="50">
                                        <div class="inner-text count-box"><span class="count-text txt" data-stop="50"
                                                data-speed="2000"></span>%</div>
                                    </div>
                                    <h6 class="title">Quality <br>of work</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="clients-section">
            <div class="auto-container">

                <div class="sponsors-outer">

                    <ul class="clients-carousel owl-carousel owl-theme">
                        <li class="slide-item"> <a href="#"><img src="images/resource/client.png"
                                    alt=""></a> </li>
                        <li class="slide-item"> <a href="#"><img src="images/resource/client.png"
                                    alt=""></a> </li>
                        <li class="slide-item"> <a href="#"><img src="images/resource/client.png"
                                    alt=""></a> </li>
                        <li class="slide-item"> <a href="#"><img src="images/resource/client.png"
                                    alt=""></a> </li>
                        <li class="slide-item"> <a href="#"><img src="images/resource/client.png"
                                    alt=""></a> </li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="testimonial-section">
            <div class="bg bg-pattern-5"></div>
            <div class="auto-container">
                <div class="row">
                    <div class="title-column col-xl-5 col-lg-4 col-md-12">
                        <div class="sec-title light">
                            <span class="sub-title">Our testimonials</span>
                            <h2>What they’re talking about us</h2>
                            <div class="text">Lorem Ipsum is simply dummy text of free available in market the
                                printing
                                and typesetting industry.</div>
                        </div>
                    </div>
                    <div class="testimonial-column col-xl-7 col-lg-8 col-md-12">
                        <div class="carousel-outer">
                            <div class="testimonial-carousel owl-carousel owl-theme">

                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="images/resource/testi-1.jpg"
                                                    alt="">
                                            </figure>
                                            <div class="info-box">
                                                <h4 class="name">Donald hardson</h4>
                                                <span class="designation">CEO - CO Founder</span>
                                            </div>
                                            <div class="rating"><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for
                                            high level overviews. Iterative approaches to corporate strategy data foster
                                            to collaborative thinking.</div>
                                    </div>
                                </div>

                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="images/resource/testi-1.jpg"
                                                    alt="">
                                            </figure>
                                            <div class="info-box">
                                                <h4 class="name">Donald hardson</h4>
                                                <span class="designation">CEO - CO Founder</span>
                                            </div>
                                            <div class="rating"><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for
                                            high level overviews. Iterative approaches to corporate strategy data foster
                                            to collaborative thinking.</div>
                                    </div>
                                </div>

                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="images/resource/testi-1.jpg"
                                                    alt="">
                                            </figure>
                                            <div class="info-box">
                                                <h4 class="name">Donald hardson</h4>
                                                <span class="designation">CEO - CO Founder</span>
                                            </div>
                                            <div class="rating"><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for
                                            high level overviews. Iterative approachesto corporate strategy data foster
                                            to collaborative thinking.</div>
                                    </div>
                                </div>

                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="images/resource/testi-1.jpg"
                                                    alt="">
                                            </figure>
                                            <div class="info-box">
                                                <h4 class="name">Donald hardson</h4>
                                                <span class="designation">CEO - CO Founder</span>
                                            </div>
                                            <div class="rating"><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for
                                            high level overviews. Iterative approaches to corporate strategy data foster
                                            to collaborative thinking.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="news-section">
            <div class="bg bg-pattern-6"></div>
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="sub-title">News & Articles</span>
                    <h2>Latest from the blog</h2>
                </div>
                <div class="row">

                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="news-details.html"><img
                                            src="images/resource/news-1.jpg" alt=""></a></figure>
                            </div>
                            <div class="content-box">
                                <span class="date">20 Dec, 2022</span>
                                <span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
                                <h5 class="title"><a href="news-details.html">Over ride the digital divide with
                                        additional</a></h5>
                                <div class="text">Lorem ipsum dolor sit amet, coned sectetur notte elit sed do.</div>
                                <a href="news-details.html" class="read-more"><i
                                        class="fa fa-long-arrow-alt-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="news-details.html"><img
                                            src="images/resource/news-2.jpg" alt=""></a></figure>
                            </div>
                            <div class="content-box">
                                <span class="date">20 Dec, 2022</span>
                                <span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
                                <h5 class="title"><a href="news-details.html">Over ride the digital divide with
                                        additional</a></h5>
                                <div class="text">Lorem ipsum dolor sit amet, coned sectetur notte elit sed do.</div>
                                <a href="news-details.html" class="read-more"><i
                                        class="fa fa-long-arrow-alt-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="news-details.html"><img
                                            src="images/resource/news-3.jpg" alt=""></a></figure>
                            </div>
                            <div class="content-box">
                                <span class="date">20 Dec, 2022</span>
                                <span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
                                <h5 class="title"><a href="news-details.html">Over ride the digital divide with
                                        additional</a></h5>
                                <div class="text">Lorem ipsum dolor sit amet, coned sectetur notte elit sed do.</div>
                                <a href="news-details.html" class="read-more"><i
                                        class="fa fa-long-arrow-alt-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="contact-section pt-0 pb-0">
            <div class="auto-container">
                <div class="row">

                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <div class="contact-form wow fadeInLeft">
                                <div class="sec-title">
                                    <span class="sub-title">Contact Now</span>
                                    <h2>Get in touch with us</h2>
                                </div>

                                <form id="contact_form" name="contact_form" class=""
                                    action="includes/sendmail.php" method="post">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="">
                                                <input name="form_name" class="form-control required" type="text"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="">
                                                <input name="form_email" class="form-control required email"
                                                    type="email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="">
                                                <input name="form_subject" class="form-control required"
                                                    type="text" placeholder="Enter Subject">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="">
                                                <input name="form_phone" class="form-control" type="text"
                                                    placeholder="Enter Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                                    </div>
                                    <div class="">
                                        <input name="form_botcheck" class="form-control" type="hidden"
                                            value="">
                                        <button type="submit" class="theme-btn btn-style-one"
                                            data-loading-text="Please wait..."><span class="btn-title">Send
                                                message</span></button>
                                        <button type="reset" class="theme-btn btn-style-one"><span
                                                class="btn-title">Reset</span></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="image-column col-lg-6 col-md-12">
                        <div class="inner-column">
                            <figure class="image"><img src="images/resource/contact.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="call-to-action">
            <div class="bg bg-pattern-8"></div>
            <div class="auto-container">
                <div class="outer-box wow fadeIn">
                    <div class="title-box">
                        <h2 class="title">Looking for the best web design <br>solutions?</h2>
                    </div>
                    <div class="btn-box">
                        <a href="page-contact.html" class="theme-btn btn-style-one light"><span
                                class="btn-title">Contact Us</span></a>
                    </div>
                </div>
            </div>
        </section>


        <footer class="main-footer">
            <div class="bg bg-pattern-9"></div>
            <div class="auto-container">
                <div class="subscribe-form">
                    <div class="title-column">
                        <h5 class="title"><i class="icon flaticon-open-envelope"></i> Subscribe now to get <br>latest
                            updates</h5>
                    </div>
                    <div class="form-column">
                        <form method="post" action="#">
                            <div class="form-group">
                                <input type="email" name="email" class="email" value=""
                                    placeholder="Email Address" required="">
                                <button type="button" class="theme-btn"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="widgets-section">
                <div class="auto-container">
                    <div class="row">

                        <div class="footer-column col-xl-3 col-lg-12 col-md-12">
                            <div class="footer-widget about-widget">
                                <div class="logo"><a href="index.html"><img
                                            src="{{ asset('assets/images/logo.png') }}" alt=""></a></div>
                                <div class="text">Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do
                                    eiusmod tempor incididunt ut labore.</div>
                                <ul class="social-icon-two">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                            <div class="footer-widget links-widget">
                                <h6 class="widget-title">Explore</h6>
                                <ul class="user-links">
                                    <li><a href="#">About Company</a></li>
                                    <li><a href="#">Meet the Team</a></li>
                                    <li><a href="#">News & Media</a></li>
                                    <li><a href="#">Our Projects</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer-column col-xl-3 col-lg-4 col-md-4 col-sm-8">
                            <div class="footer-widget gallery-widget">
                                <h6 class="widget-title">Portfolio</h6>
                                <div class="widget-content">
                                    <div class="outer clearfix">
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-1.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-2.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-3.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-4.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-5.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <figure class="image">
                                            <a href="#"><img src="images/resource/project-thumb-6.jpg"
                                                    alt=""></a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-xl-3 col-lg-4 col-md-4">
                            <div class="footer-widget contacts-widget">
                                <h6 class="widget-title">Contact</h6>
                                <div class="text">66 Road Broklyn Street, 600 New York, USA</div>
                                <ul class="contact-info">
                                    <li><i class="fa fa-envelope"></i> <a href=""><span
                                                class="__cf_email__">[email&#160;protected]</span></a><br>
                                    </li>
                                    <li><i class="fa fa-phone-square"></i> <a href="tel:+926668880000">+92 666 888
                                            0000</a><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="copyright-text">&copy; Copyright reserved by <a
                                href="index.html">kodesolution.com</a></div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('assets/js/main-slider-script.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
