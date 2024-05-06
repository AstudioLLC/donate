@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/contacts.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <div class="row">
                {{--<div class="col-12 col-lg-6 contact-map p-lg-3">
                    <div style="position: relative; overflow: hidden; height: 100%">
                        <a href="https://yandex.ru/maps/10262/yerevan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ереван</a>
                        <a href="https://yandex.ru/maps/10262/yerevan/geo/1585996071/?ll=44.457295%2C40.185780&utm_medium=mapframe&utm_source=maps&z=15.4" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Романоса Меликяна — Яндекс.Карты</a>
                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUiz4a43D" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                </div>--}}

                <div class="col-12 col-lg-6 contact-map p-lg-3">
                    @if($information->map)
                        <div style="position: relative; overflow: hidden; height: 100%">
                            <iframe src="{{ $information->map }}" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-6 contact-detail p-lg-3">
                    <span class="title-usual">{{ $page->title ?? null }}</span>
                    <div class="contact-description text-default">
                        {!! $page->content ?? null !!}
                    </div>
                    <div class="contact-form-wrap">
                        <form id="contacts-form"
                              method="POST"
                              action="{{ route('contact.send_message') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <input class="input-default"
                                           type="text"
                                           name="name"
                                           required
                                           value="{{ old('name') }}"
                                           placeholder="{{ __('frontend.Volunteering.Name and surname') }}">
                                    @if($errors->has('name'))
                                        <span class="input-alert">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 form-group">
                                    <input class="input-default"
                                           type="email"
                                           name="email"
                                           required
                                           value="{{ old('email') }}"
                                           placeholder="{{ __('frontend.Volunteering.Email address*') }}">
                                    @if($errors->has('email'))
                                        <span class="input-alert">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 form-group p-3 pb-0">
                                    <textarea name="message" placeholder="{{ __('frontend.cabinet.Type your message here') }}" class="input-default textarea-default">{{ old('message') }}</textarea>
                                    @if($errors->has('message'))
                                        <span class="input-alert">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>ReCaptcha:</strong>
                                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-submit">
                                    <button type="submit" class="button-orange">
                                        {{ __('frontend.login.Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="contact-text-content">
                        <div class="contact-text-group d-flex flex-column">
                            <span class="contact-text-group-title">{{ __('frontend.Our Address') }}</span>
                            @if($information->address)
                                <a class="contact-link text-default text-decoration-none">
                                    {{ $information->address }}
                                </a>
                            @endif
                        </div>
                        <div class="contact-text-group d-flex flex-column">
                            <span class="contact-text-group-title">{{ __('frontend.Our Phone number') }}</span>
                            @if($information->phone)
                                <a class="contact-link text-default text-decoration-none" href="tel:{{ $information->phone }}">
                                    {{ $information->phone }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection



<!--Start Modal Thank you for Volunteering -->
<div class="donate-modal justify-content-center align-items-center thank-you" id="myModal">
    <div class="donate-modal-white donate-modal-white-thank-you d-flex align-items-center position-relative">
        <div class="modal-image">
            <img class="w-100" src="{{ asset('images/thank-you.png') }}" alt="" title="">
        </div>

        <div class="donate-modal-content d-flex flex-column align-items-center thank-you-modal-content">
            <span class="title-usual">{{__('frontend.Payment.Thank you')}}</span>
            <span class="description-usual">
                    {{ __('frontend.Contact Thank you desc') }}
                </span>

        </div>

        <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
            <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
        </div>
    </div>
</div>
<!--End Modal Thank you for Volunteering -->

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/demo-modals.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/demo-modals.js') }}"></script>

@endpush

@if(session()->get('successContact'))
@push('js')
    <script>
            $('#myModal').addClass("donate-modal-opened");
    </script>
@endpush
@endif
