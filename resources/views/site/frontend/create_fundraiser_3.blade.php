@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/fundraiser3.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/profile.js') }}"></script>
@endpush

{{--@push('js')--}}

{{--@endpush--}}
{{--profile-fundraiser-card--}}
@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right fundraiser-page d-flex justify-content-center flex-column">
                <div class="fundraiser-block d-flex justify-content-center align-items-center flex-column">
                    <span class="title-usual">Lorem ipsum</span>
                    <span class="fundraiser-block-description">Lorem Ipsum Dolor</span>
                    <div class="fundraiser3-photo">
                        <img class="w-100" src="{{ asset('images/fundraiser3.png') }}" alt="" title="">
                    </div>

                    <button class="button-orange">Donate</button>

                    <div class="fundraiser3-progressbar-wrap">
                        @include('site.components.progressbar')
                    </div>

                    <div class="fundraiser3-description">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took.
                    </div>

                    <div class="fundraiser3-bottom d-flex justify-content-between align-items-center">
                        <a class="copy-link d-flex align-items-center text-decoration-none">
                            <span>Copy link</span>
                            <img class="w-100" src="{{ asset('images/copy-link-icon.svg') }}" alt="" title="">
                        </a>

                        @include('site.components.share')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
