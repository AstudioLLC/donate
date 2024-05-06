@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
@endpush

{{--@push('js')--}}

{{--@endpush--}}

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <div class="step-pages-construction d-flex flex-column">
                <span class="title-usual">Secret Santa</span>
                <div class="steps-breadcrumb-wrap d-flex justify-content-center align-items-center">
                    <div class="steps-breadcrumb d-flex align-items-center">
                        <div class="circle-wrap active-step d-flex flex-column align-items-center">
                            <div class="circle">
                                <span class="circle-number">1</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">General info</span>
                        </div>
                        <div class="steps-band"></div>
                        <div class="circle-wrap d-flex flex-column align-items-center">
                            <div class="circle circle-two">
                                <span class="circle-number">2</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">Terms & Co.</span>
                            <span class="circle-bottom-text active-step-name d-sm-none">General info</span>
                        </div>
                        <div class="steps-band"></div>
                        <div class="circle-wrap d-flex flex-column align-items-center">
                            <div class="circle circle-two">
                                <span class="circle-number">3</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">Billing Info</span>
                        </div>
                    </div>
                </div>

                <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                    <div class="step-white-block secret-santa-white">
                        <form class="row w-100" id="sponsored-child-general-info-form" action="/" method="POST">
                            <div class="col-12 col-left">
                                <div class="d-flex flex-column">
                                    <div class="white-group-main w-100 d-flex flex-column">
                                        <span class="step-group-names">Who do you want to buy a gift for?</span>
                                        <div class="select-group">
                                            <select class="select" name="approach-type">
                                                <option disabled>Amount of children</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="white-group-main w-100 d-flex flex-column">
                                        <span class="step-group-names">Information about child</span>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="select-group">
                                                    <select class="select" name="language">
                                                        <option disabled>Age</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="select-group">
                                                    <select class="select" name="language">
                                                        <option disabled>Area</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="white-group-main w-100 d-flex flex-column">
                                        <span class="step-group-names">Choose a gift</span>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="select-group">
                                                    <select class="select" name="language">
                                                        <option disabled>Amount of gift</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>

                                                <span class="select-hint">
                                                    *Cost of each gift is 5000 AMD
                                                </span>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="select-group">
                                                    <select class="select" name="language">
                                                        <option disabled>Choose a gift</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-100 d-flex flex-column justify-content-center align-items-center mt-4">
                                <div class="total">Total: <span class="total-number">20000 </span>AMD</div>
                            </div>

                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                <button class="button-orange">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
