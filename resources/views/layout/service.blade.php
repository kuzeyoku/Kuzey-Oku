<section class="services-section pt-0">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">Neler Yapıyoruz ?</span>
            <h2>Hizmetlerimiz</h2>
        </div>
        <div class="row">
            @foreach ($service as $service)
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon-box" style="background-image: url({{ $service->image_url }})"></div>
                        <h5 class="title">
                            <a href="{{ $service->url }}">{{ $service->title }}</a>
                        </h5>
                        <div class="text">{{ $service->short_description }}</div>
                        <a href="{{ $service->url }}" class="read-more"><i
                                class="fa fa-long-arrow-alt-right"></i>Detaylar</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bottom-box">
            <div class="text">Diğer Hizmetlerimizi İncelemek İstermisiniz ?
            </div>
            <a href="{{ route('service.index') }}" class="theme-btn btn-style-one"><span
                    class="btn-title">Hizmetlerimiz</span></a>
        </div>
    </div>
</section>
