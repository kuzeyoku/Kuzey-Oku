@extends('layout.main')
@section('title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <div class="blog__two section-padding">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-xl-4 col-lg-6 mb-30">
                        <div class="blog__two-item page">
                            <div class="blog__two-item-image">
                                <a href="{{ $post->url }}"><img src="{{ $post->image_url }}" alt=""></a>
                                <div class="blog__two-item-image-date">
                                    <span class="text-three">{{ $post->created_at->translatedFormat('d') }}</span>
                                    <span class="text-five">{{ $post->created_at->translatedFormat('M') }}</span>
                                </div>
                            </div>
                            <div class="blog__two-item-content">
                                <div class="blog__two-item-content-meta">
                                    <ul>
                                        <li><a><i class="far fa-eye"></i>{{ $post->view_count }}</a></li>
                                        <li><a><i class="far fa-user"></i>{{ $post->user->name }}</a></li>
                                    </ul>
                                </div>
                                <h4><a href="{{ $post->url }}">{{ $post->title }}</a>
                                </h4>
                                <a class="btn-six" href="{{ $post->url }}">{{ __('front/blog.txt3') }}<i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-80 t-center">
                <div class="col-xl-12">
                    <div class="theme__pagination">
                        {{ $posts->render('pagination::custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
