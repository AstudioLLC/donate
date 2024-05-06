@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/gift-card.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/gift-catalog.png') }}" alt="" title="">

            <img class="w-100 d-md-none" src="{{ asset('images/gift-catalog2.png') }}" alt="" title="">

            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Gift catalog</span>

                    <span class="text-default white-block-description">Buy a gift from our Gift Catalog and donate much-needed basic necessities to a child or a family.</span>

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Give</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin background-page-content">
        <h2 class="title-usual">Give A Meaningful Gift</h2>

        <div class="page-witch-background-editor text-default">
            WV Armenia’s Gift Catalog offers more than twenty essential gifts, such as clothing, food, hygiene kits, school supplies and farm animals.  Each and every gift in the Catalog was specially requested from the communities where World Vision works, and is meant to make a positive change in the lives of children.

            You may purchase a gift in the name of a friend or a relative. On their behalf, the selected item will be donated to a child or a family, who needs your support. Your loved ones will receive a keychain and a handmade "Thank You" card honoring this good deed.
        </div>
    </div>

    <div class="container-small my-margin">
        <h2 class="title-usual">Give a gift. Make a change!</h2>

        <div class="row gift-row">
            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/gift2.png') }}" alt="" title="">
                    </div>

                    <div class="gift-card-details d-flex flex-column h-100">
                        <span class="gift-card-name">Baby's Kit</span>
                        <span class="gift-card-description">
                            Provide supplies necessary for a newborn. Help mothers to take better care of their newborns by providing a set of baby...
                        </span>

                        <span class="gift-price">Price: 18000  AMD</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/gift3.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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

            <div class="col-12 col-sm-6 col-lg-4 p-3">
                <div class="gift-card d-flex flex-column h-100">
                    <div class="gift-card-image">
                        <img class="w-100" src="{{ asset('images/baby-kit.png') }}" alt="" title="">
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
    @include('site.components.frequently-asked-questions')
    @include('site.components.donate_now')
@endsection
