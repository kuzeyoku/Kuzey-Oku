<section class="about-section">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight"
                data-wow-delay="600ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">Biz Kimiz</span>
                        <h2>Kuzey Oku - Harita ve Madencilik</h2>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed
                            do eiusmod tempor incididunt ut labore et simply free text dolore magna aliqua lonm
                            andhn.</div>
                    </div>
                    <ul class="list-style-two">
                        <li><i class="fa fa-check-circle"></i> Alanında Uzman Mühendis Kadrosu</li>
                        <li><i class="fa fa-check-circle"></i> Maliyet Odaklı Çözümler</li>
                        <li><i class="fa fa-check-circle"></i> Son Teknoloji Ekipmanlar</li>
                    </ul>
                    <div class="btn-box">
                        <a href="tel:+92(8800)9806" class="info-btn">
                            <i class="icon fa fa-phone"></i>
                            <small>İletişime Geç</small> {{ config('setting.contact.phone') }}
                        </a>
                        <a href="{{ route('contact.index') }}" class="theme-btn btn-style-one"><span
                                class="btn-title">İletişim</span></a>
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
                            <div class="text"><strong>30+</strong> Mutlu <br>Müşteri</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
