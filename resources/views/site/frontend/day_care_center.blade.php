@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/day-care-center-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">Day Care Center</h2>

            <div class="mx-0 row block-mt">
                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 p-3 d-flex flex-column care-center-card">
                    <div class="care-center-image-wrap">
                        <img class="w-100" src="{{ asset('images/day1.png') }}" alt="" title="">
                    </div>

                    <div class="care-center-card-wrap">
                        <span class="care-center-card-name">Lorem Ipsum</span>

                        @include('.site.components.progressbar')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.frequently-asked-questions')

    @include('site.components.donate_now')
@endsection
