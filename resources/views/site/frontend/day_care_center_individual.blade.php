@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/care-center.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/care-center-individual.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <span class="title-usual text-start">Lorem Ipsum</span>
                    <div class="care-individual-description text-default">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </div>

                    @include('site.components.share')
                </div>

                <div class="col-12 col-lg-4 offset-lg-2 individual-page-right">
                    @include('site.components.progressbar')

                    <button type="button" href="#" class="button-orange">Donate</button>
                </div>
            </div>

            <div class="care-center-individual-picture slider">
                <div class="swiper-container care-center-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="w-100" src="{{ asset('images/individualPicture.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide">
                            <img class="w-100" src="{{ asset('images/individualPicture.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide">
                            <img class="w-100" src="{{ asset('images/individualPicture.png') }}" alt="" title="">
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev center-slider-button-prev">
                        <img class="w-100" src="{{ asset('images/arrow-left.png') }}" alt="" title="">
                    </div>

                    <div class="swiper-button-next center-slider-button-next">
                        <img class="w-100" src="{{ asset('images/arrow-right.png') }}" alt="" title="">
                    </div>
                </div>
            </div>

            <div class="care-center-description editor text-default">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
