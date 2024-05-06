@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/contacts.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => null])
    <div class="page-wrap">
        <div class="container-small">

            <div class="row">
                <div class="col-12 col-lg-6 contact-map p-lg-3">
                    <div style="position: relative; overflow: hidden; height: 100%">
                        <a href="https://yandex.ru/maps/10262/yerevan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ереван</a>
                        <a href="https://yandex.ru/maps/10262/yerevan/geo/1585996071/?ll=44.457295%2C40.185780&utm_medium=mapframe&utm_source=maps&z=15.4" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Романоса Меликяна — Яндекс.Карты</a>
                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUiz4a43D" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                </div>

                <div class="col-12 col-lg-6 contact-detail p-lg-3">
                    <span class="title-usual">Contact us</span>

                    <div class="contact-description text-default">
                        Have a question? Contact us at worldvision_armenia@wvi.org or fill out from below:
                    </div>

                    <div class="contact-form-wrap">
                        <form id="contacts-form">
                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <input type="text" name="name" class="input-default" placeholder="Full Name">
                                </div>

                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 form-group">
                                    <input type="email" name="email" class="input-default" placeholder="Email address">
                                </div>

                                <div class="col-12 form-group p-3 pb-0">
                                    <textarea name="contact-message" placeholder="Your message" class="input-default textarea-default"></textarea>
                                </div>

                                <div class="col-12 col-submit">
                                    <button type="submit" class="button-orange">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="contact-text-content">
                        <div class="contact-text-group d-flex flex-column">
                            <span class="contact-text-group-title">Our Address</span>
                            <a class="contact-link text-default text-decoration-none">World  Vision Armenia 1, Romanos Melikyan Street, Yerevan 0065, Armenia</a>
                        </div>

                        <div class="contact-text-group d-flex flex-column">
                            <span class="contact-text-group-title">Our Phone number</span>
                            <a class="contact-link text-default text-decoration-none" href="tel:+37460491010">(+374 60) 49 10 10</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
