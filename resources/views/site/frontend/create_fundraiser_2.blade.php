@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/fundraiser2.css') }}">
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

            <div class="profile-content-right fundraiser-page d-flex flex-column">
                <div class="fundraiser-block d-flex flex-column">
                    <span class="title-usual text-start">Create fundraiser</span>
                    <span class="fundraiser-block-description">
                        You can start your own fundraising campaign by choosing the cause and setting the goal. Make sure to tell about it to the world.
                    </span>

                    <div class="fundraiser-select">
                        <div class="select-group mt-0">
                            <select class="select" name="approach-type">
                                <option disabled>Lorem ipsum</option>
                                <option>Country 1</option>
                                <option>Country 2</option>
                                <option>Country 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-sm-6 p-3">
                            <a href="" class="profile-fundraiser-card d-flex flex-column text-decoration-none">
                                <span class="fundraiser-card-photo">
                                    <img class="w-100 show-eyes input-password-img-2" src="{{ asset('images/NoPath - Copy (38).png') }}" alt="" title="">
                                </span>

                                <span class="fundraiser-block-detail d-flex flex-column">
                                    <span class="fundraiser-card-name">Lorem Ipsum is simply dummy text of the printing</span>
                                    <span class="fundraiser-card-description">
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown ...
                                    </span>

                                    <span class="fundraiser-card-text-orange">Amount required 200 000 AMD</span>
                                </span>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 p-3">
                            <a href="" class="profile-fundraiser-card d-flex flex-column text-decoration-none">
                                <span class="fundraiser-card-photo">
                                    <img class="w-100 show-eyes input-password-img-2" src="{{ asset('images/NoPath - Copy (38).png') }}" alt="" title="">
                                </span>

                                <span class="fundraiser-block-detail d-flex flex-column">
                                    <span class="fundraiser-card-name">Lorem Ipsum is simply dummy text of the printing</span>
                                    <span class="fundraiser-card-description">
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown ...
                                    </span>

                                    <span class="fundraiser-card-text-orange">Amount required 200 000 AMD</span>
                                </span>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 p-3">
                            <a href="" class="profile-fundraiser-card d-flex flex-column text-decoration-none">
                                <span class="fundraiser-card-photo">
                                    <img class="w-100 show-eyes input-password-img-2" src="{{ asset('images/NoPath - Copy (38).png') }}" alt="" title="">
                                </span>

                                <span class="fundraiser-block-detail d-flex flex-column">
                                    <span class="fundraiser-card-name">Lorem Ipsum is simply dummy text of the printing</span>
                                    <span class="fundraiser-card-description">
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown ...
                                    </span>

                                    <span class="fundraiser-card-text-orange">Amount required 200 000 AMD</span>
                                </span>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 p-3">
                            <a href="" class="profile-fundraiser-card d-flex flex-column text-decoration-none">
                                <span class="fundraiser-card-photo">
                                    <img class="w-100 show-eyes input-password-img-2" src="{{ asset('images/NoPath - Copy (38).png') }}" alt="" title="">
                                </span>

                                <span class="fundraiser-block-detail d-flex flex-column">
                                    <span class="fundraiser-card-name">Lorem Ipsum is simply dummy text of the printing</span>
                                    <span class="fundraiser-card-description">
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown ...
                                    </span>

                                    <span class="fundraiser-card-text-orange">Amount required 200 000 AMD</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
