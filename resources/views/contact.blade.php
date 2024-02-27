@extends('layout.main')
@section('title', __('front/contact.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="contact-details">
        <div class="container ">
            <div class="row">
                <div class="col-xl-5 col-lg-6 mb-md-60">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">@lang('front/contact.txt2')</span>
                            <h2>@lang('front/contact.txt3')</h2>
                            <div class="text">@lang('front/contact.txt4')</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-phone-plus"></span>
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt5')</h6>
                                    <a
                                        href="tel:{{ config('setting.contact.phone') }}">{{ config('setting.contact.phone') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-envelope1"></span>
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt6')</h6>
                                    <a href="mailto:{{ config('setting.contact.email') }}"><span
                                            class="__cf_email__">{{ config('setting.contact.email') }}</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-location"></span>
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt7')</h6>
                                    <span>{{ config('setting.contact.address') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <iframe src="{{ config('setting.contact.map') }}" width="100%" height="550" frameborder="0"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>


    <section class="team-contact-form">
        <div class="container pb-100">
            <div class="sec-title text-center">
                <span class="sub-title">@lang('front/contact.txt8')</span>
                <h2 class="section-title__title">@lang('front/contact.txt9')</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{ Form::open(['url' => route('contact.send')]) }}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('front/contact.txt10')]) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('front/contact.txt11')]) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('front/contact.txt12')]) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => __('front/contact.txt13')]) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => __('front/contact.txt14')]) }}
                    </div>
                    <button type="submit" class="theme-btn btn-style-one g-recaptcha"
                        data-sitekey="{{ config('setting.recaptcha.site_key') }}" data-callback='contact-form'
                        data-action='submit'>
                        <span class="btn-title">@lang('front/contact.txt15')</span>
                    </button>
                    <button type="reset" class="theme-btn btn-style-one"><span
                            class="btn-title">@lang('front/contact.txt16')</span></button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function onSubmit(token) {
            document.getElementById("contact-form").submit();
        }
    </script>
@endsection
