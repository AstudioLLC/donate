@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/event-card.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/donation-picture.png') }}" alt="" title="">

            <img class="img-fluid d-md-none" src="{{ asset('images/donation-picture2.png') }}" alt="" title="">


            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">SMS Donation</span>

                    <span class="text-default white-block-description">Send SMS to <span class="orange">7700</span>  short number to enable us to respond to the most urgent needs. One SMS costs <span class="orange">500</span> AMD.</span>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin other-gifts-slider-block">

        <span class="title-usual">Reports</span>

        <div class="container-small reports-slider-block">
            <div class="individual-page-slider-wrapper d-flex align-items-center">
                <button class="swiper-button-prev individual-page-swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(0 11) rotate(-90)">
                            <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"></path>
                        </g>
                    </svg>
                </button>

                <div class="swiper-container individual-page-slider other-news-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slide-event-card">
                                <div class="event-image-wrap">
                                    <img class="img-fluid filter-image" src="{{ asset('images/event-image-1.jpg')  }}" alt="" title="">
                                </div>

                                <div class="event-details-wrap">
                                    <div class="event-details d-flex flex-column">
                                        <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                                        <div class="event-description">
                                            We continue to sort your donations. Part of the support has already been sent ...
                                            We continue to sort your donations. Part of the support has already been sent ...
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                            <span class="event-date">06.10.2020</span>
                                            <div class="share-img-wrap">
                                                <img class="img-fluid filter-image" src="{{ asset('images/share-img.jpg')  }}" alt="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="slide-event-card">
                                <div class="event-image-wrap">
                                    <img class="img-fluid filter-image" src="{{ asset('images/event-image-1.jpg')  }}" alt="" title="">
                                </div>

                                <div class="event-details-wrap">
                                    <div class="event-details d-flex flex-column">
                                        <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                                        <div class="event-description">
                                            We continue to sort your donations. Part of the support has already been sent ...
                                            We continue to sort your donations. Part of the support has already been sent ...
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                            <span class="event-date">06.10.2020</span>
                                            <div class="share-img-wrap">
                                                <img class="img-fluid filter-image" src="{{ asset('images/share-img.jpg')  }}" alt="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="slide-event-card">
                                <div class="event-image-wrap">
                                    <img class="img-fluid filter-image" src="{{ asset('images/event-image-1.jpg')  }}" alt="" title="">
                                </div>

                                <div class="event-details-wrap">
                                    <div class="event-details d-flex flex-column">
                                        <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                                        <div class="event-description">
                                            We continue to sort your donations. Part of the support has already been sent ...
                                            We continue to sort your donations. Part of the support has already been sent ...
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                            <span class="event-date">06.10.2020</span>
                                            <div class="share-img-wrap">
                                                <img class="img-fluid filter-image" src="{{ asset('images/share-img.jpg')  }}" alt="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="slide-event-card">
                                <div class="event-image-wrap">
                                    <img class="img-fluid filter-image" src="{{ asset('images/event-image-1.jpg')  }}" alt="" title="">
                                </div>

                                <div class="event-details-wrap">
                                    <div class="event-details d-flex flex-column">
                                        <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                                        <div class="event-description">
                                            We continue to sort your donations. Part of the support has already been sent ...
                                            We continue to sort your donations. Part of the support has already been sent ...
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                            <span class="event-date">06.10.2020</span>
                                            <div class="share-img-wrap">
                                                <img class="img-fluid filter-image" src="{{ asset('images/share-img.jpg')  }}" alt="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="swiper-button-next individual-page-swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(-97.141 11.001) rotate(-90)">
                            <path d="M5.5,103.141a.786.786,0,0,1-.545-.216L.226,98.4a.715.715,0,0,1,0-1.042.8.8,0,0,1,1.089,0l4.185,4,4.185-4a.8.8,0,0,1,1.089,0,.715.715,0,0,1,0,1.042l-4.73,4.526A.786.786,0,0,1,5.5,103.141Z" transform="translate(0 0)" fill="#0a0a0a"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @include('site.components.frequently-asked-questions')
    @include('site.components.donate_now')
@endsection
