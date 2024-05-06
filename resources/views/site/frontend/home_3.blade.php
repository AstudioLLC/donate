@extends('site.layouts.app')

@section('content')


    @push('css')
        <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/children-card.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/gift-card.css') }}">
    @endpush

    @push('js')

    @endpush

    {{--@push('js')--}}

    {{--@endpush--}}



    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right">
                <div class="profile-content-right-top">
                    <span class="title-back">
                        <img class="img-fluid" src="{{ asset('images/left-arrow.svg') }}" alt="" title="">
                        <span>back</span>
                    </span>
                </div>

                <div class="your-sponsor profile-right-block d-flex flex-column">
                    <span class="title-usual text-start title-small">Your sponsor</span>
                    @include('site.components.sponsor-card')

                    <div class="social-story-block d-flex flex-column">
                        <span class="title-usual profile-title">Social Story</span>
                        <div class="mx-0 row social-story-block">
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="http://admin.astudio.laravel/images/pdf.svg" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                                            <span class="box-date">Yesterday at 12:28pm</span>
                                        </div>
                                    </div>

                                    <div class="modal-report-box-download-icon">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/download.svg" alt="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="http://admin.astudio.laravel/images/pdf.svg" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                                            <span class="box-date">Yesterday at 12:28pm</span>
                                        </div>
                                    </div>

                                    <div class="modal-report-box-download-icon">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/download.svg" alt="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="http://admin.astudio.laravel/images/pdf.svg" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                                            <span class="box-date">Yesterday at 12:28pm</span>
                                        </div>
                                    </div>

                                    <div class="modal-report-box-download-icon">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/download.svg" alt="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="http://admin.astudio.laravel/images/pdf.svg" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                                            <span class="box-date">Yesterday at 12:28pm</span>
                                        </div>
                                    </div>

                                    <div class="modal-report-box-download-icon">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/download.svg" alt="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="http://admin.astudio.laravel/images/pdf.svg" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                                            <span class="box-date">Yesterday at 12:28pm</span>
                                        </div>
                                    </div>

                                    <div class="modal-report-box-download-icon">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/download.svg" alt="" title="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="give-gift-page d-flex flex-column">
                        <span class="title-usual text-start title-small">Give a gift</span>
                        <span class="gift-description">
                            With the needs of the family in mind, we offer to support the family
                            of your sponsored child by choosing one of the offered gifts.
                        </span>

                        <div class="mx-0 row gifts-row">
                            <div class="col-12 col-sm-6 p-2">
                                <div class="gift-card d-flex flex-column h-100">
                                    <div class="gift-card-image">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/baby-kit.png" alt="" title="">
                                    </div>

                                    <div class="gift-card-details d-flex flex-column">
                                        <span class="gift-card-name">Baby's Kit</span>
                                        <span class="gift-card-description">
                                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                                        </span>

                                        <span class="gift-price">Price: 18000  AMD</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <div class="gift-card d-flex flex-column h-100">
                                    <div class="gift-card-image">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/baby-kit.png" alt="" title="">
                                    </div>

                                    <div class="gift-card-details d-flex flex-column">
                                        <span class="gift-card-name">Baby's Kit</span>
                                        <span class="gift-card-description">
                                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                                        </span>

                                        <span class="gift-price">Price: 18000  AMD</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <div class="gift-card d-flex flex-column h-100">
                                    <div class="gift-card-image">
                                        <img class="w-100" src="http://admin.astudio.laravel/images/baby-kit.png" alt="" title="">
                                    </div>

                                    <div class="gift-card-details d-flex flex-column">
                                        <span class="gift-card-name">Baby's Kit</span>
                                        <span class="gift-card-description">
                                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                                        </span>

                                        <span class="gift-price">Price: 18000  AMD</span>
                                    </div>
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
