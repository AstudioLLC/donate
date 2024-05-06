@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/mydetails.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/profile.js') }}"></script>
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

            <div class="profile-content-right fundraiser-page d-flex flex-column">
                <div class="mydetails-block d-flex flex-column">
                    <span class="title-usual text-start">My details</span>

                    <form id="my-details-form" class="my-detail-form w-100">
                        <div class="row mt-4">
                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="name" placeholder="Name">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <div class="select-group mt-0">
                                    <select class="select" name="approach-type">
                                        <option disabled>Country</option>
                                        <option>Country 1</option>
                                        <option>Country 2</option>
                                        <option>Country 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="Surname" placeholder="Surname">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="City" placeholder="City">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="tel" class="input-default" name="Phone number" placeholder="Phone number">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="Address" placeholder="Address">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="Email address" placeholder="Email address">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <input type="text" class="input-default" name="Address 2" placeholder="Address 2">
                            </div>

                            <div class="col-12 p-2 d-flex justify-content-start mt-2">
                                <button class="button-orange">Save changes</button>
                            </div>
                        </div>
                    </form>

                    <form class="password-form w-100">
                        <div class="row mt-4">
                            <div class="col-12 col-sm-6 p-2 d-flex justify-content-center align-items-center position-relative show-inp">
                                <input type="password" class="input-default input-password " name="Current password" placeholder="Current password">
                                <img class="img-fluid show-eyes input-password-img" src="{{ asset('images/show.svg') }}" alt="" title="">
                            </div>

                            <div class="col-12 col-sm-6 p-2 d-flex flex-column justify-content-center align-items-center position-relative show-inp">
                                <input type="password" class="input-default input-password-2" name="New password" placeholder="New password">
                                <img class="img-fluid show-eyes input-password-img-2" src="{{ asset('images/show.svg') }}" alt="" title="">
                                <span class="character">5 to 20 characters</span>
                            </div>

                            <div class="col-12 p-2 d-flex justify-content-start mt-5 mt-sm-3">
                                <button class="button-orange">Save password</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
