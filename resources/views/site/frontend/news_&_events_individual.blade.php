@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush


@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/news-and-events-individual.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/event-card.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')
    <div class="page-wrap">
        <div class="container-small d-flex flex-column">
            <a href="" class="back-to-news d-flex align-items-center text-decoration-none">
                <img class="img-fluid me-2 me-lg-3" src="{{ asset('images/left-arrow.svg') }}" alt="" title="">
                Back
            </a>

            <span class="title-usual">Summing up the results of our #TavushStrong initiative</span>

            <span class="news-date">09.09.2020</span>

            <div class="news-image-wrap">
                <img class="img-fluid" src="{{ asset('images/jessica-rockowitz-lMLG68e4wYk-unsplash.png') }}" alt="" title="">
            </div>

            <div class="news-description text-default">
                We are summing up the results of our #TavushStrong initiative. Thanks to all of our donors. Together, we have been able to replenish shelters in 8 border communities in Tavush, Armenia, making them a safer place for both adults and children.

                From now on, shelters will become safer for residents of Berd, Artsvaberd, Choratan, Tavush, Movses, Chinari, Nerkin Karmiraghbyur, and the border villages of Aygepar.

                This became possible thanks to cooperation with the administration of the Tavush region. Our charity campaign, launched in July, was unprecedented, with many people, international and local organizations joining us, as well as our compatriots from the diaspora.
                The shelters are provided with:

                water tanks with a tap, electric generators, rechargeable flashlights, sleeping bags, blankets, dispensers with essential medicines and supplies, loudspeakers.
            </div>

            @include('site.components.share')
        </div>
    </div>

    <div class="container-small my-margin other-news-slider-block">
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

    @include('site.components.donate_now')
@endsection
