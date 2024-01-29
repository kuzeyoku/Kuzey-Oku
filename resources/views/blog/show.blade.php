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
                        <div class="comment-form mb-80">
                            <h4 class="comment-form__title">Yorumunuzu Yazın</h4>
                            {{ Form::open(['url' => route('blog.comment_store', $post)]) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ad Soyad']) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Yorumunuz', 'rows' => 5]) }}
                            </div>
                            <div class="mb-3">
                                <button class="theme-btn btn-style-one" type="submit"
                                    class="theme-btn btn-style-one g-recaptcha"
                                    data-sitekey="{{ config('setting.recaptcha.site_key') }}" data-callback='comment-form'
                                    data-action='submit'>Gönder</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">{{ $post->comments->count() }} Comments</h3>
                            @foreach ($comments as $comment)
                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="{{ $comment->gravatar_url }}" alt="">
                                    </div>
                                    <div class="comment-one__content">
                                        <div class="d-flex justify-content-between">
                                            <h3>{{ $comment->name }}</h3>
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p>{{ $comment->comment }} </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $comments->onEachSide(1)->links("pagination::default") }}
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
