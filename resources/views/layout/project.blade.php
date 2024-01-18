<section class="projects-section-two p-0">
    <div class="bg-image" style="background-image: url({{ asset('assets/images/background/2.jpg') }})"></div>
    <div class="auto-container">
        <div class="upper-box">
            <div class="counter-column">
                <div class="count-box">
                    <span class="title">Tamamlanmış Uçuş (ha)</span>
                    <div class="numbers">5000+</div>
                </div>
            </div>
            <div class="text-column">
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod
                    tempor incididunt ut labore et dolore magna aliqua.</div>
            </div>
        </div>
        <div class="sec-title text-center light">
            <span class="sub-title">Neler Yaptık ?</span>
            <h2>Tamamlanmış Projelerimiz</h2>
        </div>
        <div class="carousel-outer">
            <div class="projects-carousel owl-carousel owl-theme">
                @foreach ($project as $project)
                    <div class="project-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ $project->url }}"><img
                                            src="{{ $project->image_url }}" alt=""></a>
                                </figure>
                                <div class="info-box">
                                    <a href="{{ $project->url }}" class="read-more"><i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                    {{-- <span class="cat">Graphics</span> --}}
                                    <h6 class="title"><a href="{{ $project->url }}">{{ $project->title }}</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
