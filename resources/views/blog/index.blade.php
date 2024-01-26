@extends('layout.main')
@section('title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="bg-silver-light">
        <div class="container pb-90">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="news-block col-xl-4 col-lg-6 col-md-6">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ $post->url }}"><img src="{{ $post->image_url }}" alt=""></a>
                                </figure>
                            </div>
                            <div class="content-box">
                                <span class="date">{{ $post->created_at->translatedFormat('d M Y') }}</span>
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
@endsection
