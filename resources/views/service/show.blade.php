@extends('layout.main')
@section('title', $service->title)
@section('parent_url', route('service.index'))
@section('parent_title', 'Hizmetlerimiz')
@section('content')
    @include('layout.breadcrumb')
    <section class="services-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">
                        <div class="sidebar-widget service-sidebar-single">
                            @if ($otherServices)
                                <div class="sidebar-service-list">
                                    <ul>
                                        @foreach ($otherServices as $item)
                                            <li><a href="{{ $item->url }}" class="current"><i
                                                        class="fas fa-angle-right"></i><span>{{ $item->title }}</span></a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                            <div class="service-details-help">
                                <div class="help-shape-1"></div>
                                <div class="help-shape-2"></div>
                                <h2 class="help-title">Daha fazla detay için iletişime geçin</h2>
                                <div class="help-icon">
                                    <span class=" lnr-icon-phone-handset"></span>
                                </div>
                                <div class="help-contact">
                                    <p>Hızlı İletişim</p>
                                    <a
                                        href="tel:{{ config('setting.contact.phone') }}">{{ config('setting.contact.phone') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                        <img src="{{ $service->image_url }}" alt="">
                        <h3 class="mt-4">{{ $service->title }}</h3>
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
