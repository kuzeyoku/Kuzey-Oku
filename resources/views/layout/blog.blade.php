<section class="news-section">
    <div class="bg bg-pattern-19"></div>
    <div class="auto-container">
        <div class="sec-title text-center light">
            <span class="sub-title">Blog & Haberler</span>
            <h2>Blog Yazılarımız</h2>
        </div>
        <div class="row">
            @foreach ($blog as $post)
                <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ $post->url }}">
                                    <img src="{{ $post->image_url }}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="content-box border">
                            <span class="date">{{ $post->created_at->translatedFormat('d M, Y') }}</span>
                            <span class="post-info"><i class="fa fa-user-circle"></i>{{ $post->user->name }}</span>
                            <h5 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></h5>
                            <div class="text">{{ $post->short_description }}</div>
                            <a href="{{ $post->url }}" class="read-more"><i class="fa fa-long-arrow-alt-right"></i>
                                Devamı</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
