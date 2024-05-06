@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/gift-card.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/stephen-andrews-u0zTce7KNlY-unsplash.png') }}" alt="" title="">

            <img class="img-fluid d-md-none" src="{{ asset('images/give2.png') }}" alt="" title="">


            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Knowledge for life</span>

                    <span class="text-default white-block-description">
                        A set of children’s books.

                        Provide a child with a set of age-relevant books, such as fairy tales, educational books or a Children’s Encyclopedia. Your gift will help them think, learn and discover the world.

                        “I have my first Encyclopedia now and when I don’t know something I find it in the book,” says 11-year old Sofi.
                    </span>

                    <span class="give-price-text">Price: 10000  AMD</span>

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Give</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>


    <div class="container-small my-margin other-gifts-slider-block">

        <span class="title-usual">Other gifts</span>

        <div class="individual-page-slider-wrapper d-flex align-items-center">
            <button class="swiper-button-prev individual-page-swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                    <g transform="translate(0 11) rotate(-90)">
                        <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"></path>
                    </g>
                </svg>
            </button>

            <div class="swiper-container individual-page-slider other-gifts-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gift-card d-flex flex-column h-100">
                            <div class="gift-card-image">
                                <img class="img-fluid" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
                            </div>

                            <div class="gift-card-details d-flex flex-column">
                                <span class="gift-card-name">Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit</span>
                                <span class="gift-card-description">
                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                        </span>

                                <span class="gift-price">Price: 18000  AMD</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="gift-card d-flex flex-column h-100">
                            <div class="gift-card-image">
                                <img class="img-fluid" src="{{ asset('images/gift2.png') }}" alt="" title="">
                            </div>

                            <div class="gift-card-details d-flex flex-column">
                                <span class="gift-card-name">Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit</span>
                                <span class="gift-card-description">
                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                        </span>

                                <span class="gift-price">Price: 18000  AMD</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="gift-card d-flex flex-column h-100">
                            <div class="gift-card-image">
                                <img class="img-fluid" src="{{ asset('images/gift3.png') }}" alt="" title="">
                            </div>

                            <div class="gift-card-details d-flex flex-column">
                                <span class="gift-card-name">Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit</span>
                                <span class="gift-card-description">
                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                        </span>

                                <span class="gift-price">Price: 18000  AMD</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                    <div class="gift-card d-flex flex-column h-100">
                        <div class="gift-card-image">
                            <img class="img-fluid" src="{{ asset('images/gift2.png') }}" alt="" title="">
                        </div>

                        <div class="gift-card-details d-flex flex-column">
                            <span class="gift-card-name">Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit Baby's Kit</span>
                            <span class="gift-card-description">
                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                        </span>

                            <span class="gift-price">Price: 18000  AMD</span>
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
    @include('site.components.frequently-asked-questions')
    @include('site.components.donate_now')
@endsection
