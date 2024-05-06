@extends('site.layouts.app')


@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/photos-videos.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/photos-videos.js') }}"></script>
@endpush

@section('content')
    <div class="photos-videos-block">
        <div class="container d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="close-videos-gallerys-block">
                <img class="img-fluid" src="{{ asset('images/cancel.svg') }}" alt="" title="">
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img-fluid" src="{{ asset('images/gallery-image.png') }}" alt="" title="">
                    </div>

                    <div class="swiper-slide">
                        <img class="img-fluid" src="{{ asset('images/gallery-image.png') }}" alt="" title="">
                    </div>
                </div>

                {{--                <div class="photos-videos-details">--}}


                {{--                    <div class="swiper-pagination"></div>--}}

                {{--                    <div class="photos-videos-swiper-btn-group">--}}
                {{--                        <div class="swiper-button-prev">--}}
                {{--                            <img class="img-fluid" src="{{ asset('images/left -arrow.svg') }}" alt="" title="">--}}
                {{--                        </div>--}}

                {{--                        <div class="swiper-button-next">--}}
                {{--                            <img class="img-fluid" src="{{ asset('images/right-arrow.svg') }}" alt="" title="">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                </div>--}}

            </div>

            <div class="photos-videos-details">


                <div class="swiper-pagination"></div>

                <div class="photos-videos-swiper-btn-group">
                    <div class="swiper-button-prev">
                        <img class="img-fluid" src="{{ asset('images/left -arrow.svg') }}" alt="" title="">
                    </div>

                    <div class="swiper-button-next">
                        <img class="img-fluid" src="{{ asset('images/right-arrow.svg') }}" alt="" title="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
