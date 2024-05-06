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
                <span class="title-usual">Donate</span>
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
                    <div class="step-white-block step-white-block-donate">
                        <form class="row w-100" id="sponsored-child-general-info-form" action="/" method="POST">
                            <div class="col-12 col-left">
                                <div class="white-group-main w-100 d-flex flex-column">
                                    <span class="step-group-names">Whom do you want to sponsor?</span>
                                    <div class="select-group">
                                        <select class="select" name="approach-type">
                                            <option disabled>Select approach type</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
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
                                    <span class="step-group-names">Donation Amount</span>
                                    <div class="mt-1 donate-step-buttons row">
                                        <div class="p-2 col-6 col-md-">
                                            <div class="step-button">8000 AMD</div>
                                        </div>

                                        <div class="p-2 col-6 col-md-4">
                                            <div class="step-button">8000 AMD</div>
                                        </div>

                                        <div class="p-2 col-6 col-md-4">
                                            <div class="step-button">8000 AMD</div>
                                        </div>

                                        <div class="p-2 col-6 col-md-4">
                                            <div class="step-button">8000 AMD</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="white-group-main">
                                    <span class="step-group-names d-flex align-items-center">
                                            Frequency
                                        </span>

                                    <div class="step-group step-group-right">
                                        <label class="text-default custom-radio"><input name="do-you-want-to-donate-anonymously" type="radio" value="one-time"><span>One time</span></label>
                                        <label class="text-default custom-radio"><input name="do-you-want-to-donate-anonymously" type="radio" value="monthly"><span>Monthly</span></label>
                                    </div>
                                </div>

                                <div class="white-group-main">
                                    <span class="step-group-names d-flex align-items-center">
                                            Do you want to donate anonymously?
                                        </span>

                                    <div class="step-group step-group-right">
                                        <label class="text-default custom-radio"><input name="do-you-want-to-donate-anonymously" type="radio" value=">automatic"><span>Yes</span></label>
                                        <label class="text-default custom-radio"><input name="do-you-want-to-donate-anonymously" type="radio" value="manually"><span>No</span></label>
                                    </div>
                                </div>

                                <div class="white-group-main">
                                    <textarea name="sponsor-a-child-comment" placeholder="Comment" class="input-default textarea-default"></textarea>
                                </div>

                                <div class="white-group-main donate-markup d-flex align-items-start">
                                    <img class="img-fluid" src="{{ asset('images/attention.png') }}" alt="" title="">
                                    <span class="markup-text ms-2">
                                        Նվիրաբերած գումարն օգտագործվելու է առաջին անհրաժեշտության կարիքների համար
                                    </span>
                                </div>

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
