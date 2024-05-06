@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/children-card.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/slider-profile.js') }}"></script>
@endpush

{{--@push('js')--}}

{{--@endpush--}}

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right">
                <div class="profile-content-right-top">
                    <span class="title-usual profile-title">My Sponsorship</span>

                    <button type="button" class="button-orange">
                        <img class="img-fluid" src="{{ asset('images/add-size.svg') }}" alt="" title="">
                        <span>New Sponsorship</span>
                    </button>
                </div>

                <div class=" your-sponsor profile-right-block d-flex flex-column">
                    <div class="profile-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                @include('site.components.sponsor-card')
                            </div>

                            <div class="swiper-slide">
                                @include('site.components.sponsor-card')
                            </div>

                            <div class="swiper-slide">
                                @include('site.components.sponsor-card')
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                @include('site.components.home1')
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
