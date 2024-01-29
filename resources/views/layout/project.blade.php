<section class="projects-section style-two pull-up">
    <div class="bg bg-pattern-10 lign"></div>
    <div class="auto-container">
        <div class="sec-title light">
            <span class="sub-title">Projelerimiz</span>
            <h2>Tamamlanan Projelerimiz</h2>
        </div>
        <div class="carousel-outer">
            <div class="projects-carousel-two owl-carousel owl-theme">
                @foreach ($project as $project)
                    <div class="project-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ $project->url }}"><img
                                            src="{{ $project->image_url }}" alt=""></a>
                                </figure>
                                <div class="info-box">
                                    <a href="page-project-details.htmlpage-project-details.html" class="read-more"><i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                    <span class="cat">Graphics</span>
                                    <h6 class="title"><a href="page-project-details.html.htm">Digital marketing
                                            web</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
