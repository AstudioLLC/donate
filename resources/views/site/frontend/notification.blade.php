@extends('site.layouts.app')

@section('content')


    @push('css')
        <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">

        <link rel="stylesheet" href="{{ ('css/frontend/notification.css') }}">
    @endpush



    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right">
                <div class="notification-block d-flex flex-column">
                    <div class="title-top">
                        <span class="title-usual text-start">Notification</span>
                        <span class="all-read">Mark all as read</span>
                    </div>

                    <div class="notification-content">
                        <div class="donation-box d-flex justify-content-center flex-column position-relative">
                            <div class="donation-box-top">
                                <div class="d-flex flex-column">
                                    <span class="donation-text-bold">Thank you for your donation!</span>
                                    <span class="now">Now</span>
                                </div>

                                <div>
                                    <span class="read">Read Less</span>
                                </div>
                            </div>

                            <div class="donation-top-description">
                                This is a confirmation that we received your donation of 10000 AMD to Lorem ipsum Foundation.
                                Thank you for helping make difference. We've begun processing your gift - you can follow its status in
                                <a href="#" class="link-orange text-decoration-none"> Your Donation History Page</a>
                            </div>

                            <div class="your-donation donation-text-bold">Your Donation: 10000AMD (One Time)</div>

                            <span class="read read-mobile">Read Less</span>
                        </div>

                        <div class="donation-box d-flex justify-content-center flex-column position-relative">
                            <div class="donation-box-custom">
                                <div class="d-flex flex-column">
                                    <span class="donation-text-bold">Thank you for your donation!</span>
                                    <span class="donation-date">14.01.2021</span>
                                </div>

                                <div>
                                    <span class="read">Read More</span>
                                </div>
                            </div>
                            <div class="notification-circle"></div>
                        </div>

                        <div class="donation-box d-flex justify-content-center flex-column position-relative">
                            <div class="donation-box-custom">
                                <div class="d-flex flex-column">
                                    <span class="donation-text-bold">Thank you for your donation!</span>
                                    <span class="donation-date">14.01.2021</span>
                                </div>

                                <div>
                                    <span class="read">Read More</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
