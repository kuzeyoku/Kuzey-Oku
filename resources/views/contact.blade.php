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
                            <span class="sub-title">Need any help?</span>
                            <h2>Get in touch with us</h2>
                            <div class="text">Lorem ipsum is simply free text available dolor sit amet, consectetur
                                notted adipisicing elit sed do eiusmod tempor incididunt simply free ut labore et
                                dolore magna aliqua.</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-phone-plus"></span>
                                </div>
                                <div class="text">
                                    <h6>Telefon</h6>
                                    <a
                                        href="tel:{{ config('setting.contact.phone') }}">{{ config('setting.contact.phone') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-envelope1"></span>
                                </div>
                                <div class="text">
                                    <h6>E-Posta Adresimiz</h6>
                                    <a href="mailto:{{ config('setting.contact.email') }}"><span
                                            class="__cf_email__">{{ config('setting.contact.email') }}</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-location"></span>
                                </div>
                                <div class="text">
                                    <h6>Adresimiz</h6>
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
                <span class="sub-title">Mesajınızı Gönderin</span>
                <h2 class="section-title__title">Soru, Görüş, Önerileri, <br>Detaylı Bilgi ve Teklif Almak İçin Bize Yazın
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{ Form::open(['url' => route('contact.send')]) }}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Adınız Soyadınız']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail Adresiniz']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefon Numaranız']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Konu']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Mesajınız']) }}
                    </div>
                    <button type="submit" class="theme-btn btn-style-one g-recaptcha"
                        data-sitekey="{{ config('setting.recaptcha.site_key') }}" data-callback='contact-form'
                        data-action='submit'>
                        <span class="btn-title">Gönder</span>
                    </button>
                    <button type="reset" class="theme-btn btn-style-one"><span class="btn-title">Temizle</span></button>
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
