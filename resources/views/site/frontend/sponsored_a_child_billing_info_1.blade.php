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
                <span class="title-usual">Billing information</span>
                <div class="steps-breadcrumb-wrap d-flex justify-content-center align-items-center">
                    <div class="steps-breadcrumb d-flex align-items-center">
                        <div class="circle-wrap past-step d-flex flex-column align-items-center">
                            <div class="circle">
                                <span class="circle-number">1</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">General info</span>
                        </div>
                        <div class="steps-band past-step-band"></div>
                        <div class="circle-wrap past-step d-flex flex-column align-items-center">
                            <div class="circle circle-two">
                                <span class="circle-number">2</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">Terms & Co.</span>
                            <span class="circle-bottom-text active-step-name d-sm-none">Billing Info</span>
                        </div>
                        <div class="steps-band past-step-band"></div>
                        <div class="circle-wrap active-step d-flex flex-column align-items-center">
                            <div class="circle circle-two">
                                <span class="circle-number">3</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">Billing Info</span>
                        </div>
                    </div>
                </div>
                <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                    <div class="step-white-block">
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="step-group-names">Billing information</span>
                        </div>

                        <form class="row w-100 mt-4" id="billing-info-form-page-1" action="/" method="POST">


                            <div class="col-12 col-md-6 col-left">
                                <div class="default-form-group">
                                    <input name="name" type="text" class="input-default" placeholder="Name*">
                                </div>

                                <div class="default-form-group">
                                    <input name="surname" type="text" class="input-default" placeholder="Surname*">
                                </div>

                                <div class="default-form-group">
                                    <input name="phone number" type="number" class="input-default" placeholder="Phone number*">
                                </div>

                                <div class="default-form-group">
                                    <input name="email" type="email" class="input-default" placeholder="Email address*">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-right billing-info-col-right">
                                <div class="select-group mt-0 select-country">
                                    <select class="select" name="approach-type">
                                        <option disabled>Country*</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>

                                <div class="default-form-group">
                                    <input name="surname" type="text" class="input-default" placeholder="City*">
                                </div>

                                <div class="default-form-group">
                                    <input name="phone number" type="number" class="input-default" placeholder="Address">
                                </div>

                                <div class="default-form-group">
                                    <input name="email" type="email" class="input-default" placeholder="Address">
                                </div>
                            </div>

                            <div class="step-3-checkbox d-flex justify-content-center align-items-center mt-3">
                                <input type="checkbox" class="custom-checkbox" id="step-3-check" name="step-3-check" value="yes">
                                <label class="text-default" for="step-3-check">Please send me the latest news from donate.am</label>
                            </div>

                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                <button class="button-orange">Play</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
