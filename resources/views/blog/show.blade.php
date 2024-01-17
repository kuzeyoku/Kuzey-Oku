@extends('layout.main')
@section('title', $post->title)
@section('content')
    @include('layout.breadcrumb')
    <div class="news__details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 order-last order-lg-first">
                    <div class="all__sidebar">
                        @if ($categories->count() > 0)
                            <div class="all__sidebar-item">
                                <h4>{{ __('front/blog.txt4') }}</h4>
                                <div class="all__sidebar-item-solution">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a href="{{ $category->url }}"><i
                                                        class="far fa-chevron-double-right"></i>{{ $category->title }}<span>({{ $category->countBlogs() }})</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if ($popularPost->count() > 0)
                            <div class="all__sidebar-item">
                                <h4>{{ __('front/blog.txt5') }}</h4>
                                <div class="all__sidebar-item-post">
                                    @foreach ($popularPost as $post)
                                        <div class="post__item">
                                            <div class="post__item-image">
                                                <a href="{{ $post->url }}"><img src="{{ $post->image_url }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="post__item-title">
                                                <h6><a href="{{ $post->url }}">{{ $post->title }}</a>
                                                </h6>
                                                <span><i
                                                        class="far fa-calendar-alt"></i>{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 lg-mb-60">
                    <div class="news__details-left">
                        <div class="news__details-left-meta">
                            <ul>
                                <li>
                                    <div class="news__details-left-meta-date">
                                        <span class="text-three">{{ $post->created_at->translatedFormat('d') }}</span>
                                        <span class="text-five">{{ $post->created_at->translatedFormat('M') }}</span>
                                    </div>
                                </li>
                                <li><a><i class="far fa-user"></i>{{ $post->user->name }}</a></li>
                                <li><a><i class="far fa-eye"></i>{{ $post->view_count }}</a></li>
                            </ul>
                            <h3 class="mt-20">{{ $post->title }}</h3>
                        </div>
                        {!! $post->description !!}
                        <div class="mt-45 mb-20">
                            <div class="news__details-left-tag">
                                <h6>{{ __('front/blog.txt7') }}</h6>
                                <ul>
                                    @foreach ($post->tags_to_array as $tag)
                                        <li><a>{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="news__details-pagination">
                        <div class="news__details-pagination-item">
                            @if ($nextPost)
                                <a href="{{ $nextPost->url }}">
                                    <div class="news__details-pagination-item-left dark__image">
                                        <img src="{{ $nextPost->image_url }}" alt="">
                                        <div class="news__details-pagination-item-content">
                                            <h6>{{ $nextPost->title }}</h6>
                                        </div>
                                    </div>
                                    <div class="news__details-pagination-item-right">
                                        <i class="far fa-arrow-right"></i>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="news__details-pagination-item center">
                            <div class="news__details-pagination-item-icon">
                                <img src="{{ asset('assets/img/icon/menu.png') }}" alt="">
                            </div>
                        </div>
                        <div class="news__details-pagination-item">
                            @if ($previousPost)
                                <a href="{{ $previousPost->url }}">
                                    <div class="news__details-pagination-item-right">
                                        <i class="far fa-arrow-left"></i>
                                    </div>
                                    <div class="news__details-pagination-item-left dark__image">
                                        <div class="news__details-pagination-item-content t-right">
                                            <h6>{{ $previousPost->title }}</h6>
                                        </div>
                                        <img src="{{ $previousPost->image_url }}" alt="">
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
