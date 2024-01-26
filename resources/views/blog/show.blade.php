@extends('layout.main')
@section('title', $post->title)
@section('parent_url', route('blog.index'))
@section('parent_title', 'Blog & Haberler')
@section('content')
    @include('layout.breadcrumb')
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ $post->image_url }}" alt="">
                            <div class="blog-details__date">
                                <span class="day">{{ $post->created_at->translatedFormat('d') }}</span>
                                <span class="month">{{ $post->created_at->translatedFormat('M') }}</span>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a><i class="fas fa-user-circle"></i>{{ $post->user->name }}</a>
                                </li>
                                <li><a><i class="fas fa-eye"></i>{{ $post->view_count }} Görüntüleme</a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">{{ $post->title }}</h3>
                            {!! $post->description !!}
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Etiketler</span>
                                @foreach ($post->tagsToArray as $tag)
                                    <a href="#">{{ $tag }}</a>
                                @endforeach
                            </p>
                            @if (config('setting.social'))
                                <div class="blog-details__social-list">
                                    @foreach (config('setting.social', []) as $key => $value)
                                        <a href="{{ config('setting.social.' . $key) }}"><i
                                                class="fab fa-{{ $key }}"></i></a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="nav-links">
                            @if ($post->previous)
                                <div class="prev">
                                    <a href="{{ $post->previous->url }}" rel="prev">{{ $post->previous->title }}</a>
                                </div>
                            @endif
                            @if ($post->next)
                                <div class="next">
                                    <a href="{{ $post->next->url }}" rel="next">{{ $post->next->title }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Popüler Konular</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($popularPost as $item)
                                    <li>
                                        <div class="sidebar__post-image"> <img src="{{ $item->image_url }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3> <span class="sidebar__post-content-meta"><i
                                                        class="fas fa-user-circle"></i>{{ $item->user->name }}</span> <a
                                                    href="{{ $item->url }}">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if ($categories->count() > 0)
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">Kategoriler</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ $category->url }}">{{ $category->title }}<span
                                                    class="icon-right-arrow"></span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
