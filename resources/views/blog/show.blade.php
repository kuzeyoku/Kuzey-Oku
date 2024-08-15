@extends('layout.main')
@section('title', $blog->title)
@section('parent_url', route('blog.index'))
@section('parent_title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            {{ $blog->getFirstMedia('cover') }}
                            <div class="blog-details__date">
                                <span class="day">{{ $blog->created_at->translatedFormat('d') }}</span>
                                <span class="month">{{ $blog->created_at->translatedFormat('M') }}</span>
                            </div>
                        </div>
                        <ul class="blog-details__meta">
                            <li>
                                <a href="javascript:void(0);">
                                    @svg('fas-sitemap', 'icon-space')
                                    {{ $blog->category->title ?? __('front/general.uncategorized') }}
                                </a>
                            </li>
                            <li><a>@svg('fas-user-circle', 'icon-space')</i>{{ $blog->user->name }}</a>
                            </li>
                            <li><a>@svg('fas-eye', 'icon-space'){{ $blog->view_count }} @lang('front/blog.txt4')</a>
                            </li>
                        </ul>
                        <div class="blog-details__content">

                            <h3 class="blog-details__title">{{ $blog->title }}</h3>
                            {!! $blog->description !!}
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>@lang('front/blog.txt5')</span>
                                @foreach ($blog->tagsToArray as $tag)
                                    <a href="javascript:void(0);" class="mb-2">{{ $tag }}</a>
                                @endforeach
                            </p>
                        </div>
                        <div class="nav-links">
                            @if ($blog->previous)
                                <div class="prev">
                                    <a href="{{ $blog->previous->url }}" rel="prev">{{ $blog->previous->title }}</a>
                                </div>
                            @endif
                            @if ($blog->next)
                                <div class="next">
                                    <a href="{{ $blog->next->url }}" rel="next">{{ $blog->next->title }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="comment-form mb-80">
                            <h4 class="comment-form__title">@lang('front/blog.txt6')</h4>
                            {{ html()->form()->route('blog.comment_store', $blog)->open() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        {{ html()->text('name')->placeholder(__('front/blog.txt7'))->class('form-control') }}
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        {{ html()->email('email')->placeholder(__('front/blog.txt8'))->class('form-control') }}
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                {{ html()->textarea('comment')->placeholder(__('front/blog.txt9'))->rows(5)->class('form-control') }}
                                @error('comment')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {{ html()->submit(__('front/blog.txt10'))->class('theme-btn btn-style-one g-recaptcha')->attributes([
                                        'data-sitekey' => config('setting.recaptcha.site_key'),
                                        'data-callback' => 'comment-form',
                                        'data-action' => 'submit',
                                    ]) }}
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                        <div class="comment-one">
                            <h4 class="comment-one__title">@lang('front/blog.txt11', [
                                'num' => $comments->count(),
                            ])</h4>
                            @foreach ($comments as $comment)
                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="{{ $comment->gravatar_url }}" alt="avatar">
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
                        {{ $comments->onEachSide(1)->links('blog.pagination') }}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">@lang('front/blog.txt12')</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($popularPost as $item)
                                    <li>
                                        <div class="sidebar__post-image"> <img src="{{ $item->getFirstMediaUrl('cover') }}"
                                                alt="{{ $blog->title }}">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3> <span
                                                    class="sidebar__post-content-meta">@svg('fas-user-circle', 'icon-space'){{ $item->user->name }}</span>
                                                <a href="{{ $item->url }}">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if ($categories->isNotEmpty())
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">@lang('front/blog.txt13')</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ $category->url }}">@svg('fas-arrow-right', 'icon-space'){{ $category->title }}</a>
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
@include('common.alert')
