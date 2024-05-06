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
                <span class="title-usual">Knowledge for life</span>
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
                            <div class="col-12 col-left white-group-main">
                                <div class="white-group-main w-100 d-flex flex-column">
                                    <span class="step-group-names text-center">Gift Amount</span>
                                    <div class="mt-1 donate-step-buttons row d-flex justify-content-center">
                                        <div class="p-2 col-6 col-md-4">
                                            <div class="step-button">8000 AMD</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="white-group-main w-100 d-flex flex-column justify-content-center align-items-center">
                                    <span class="step-group-names text-center w-100 d-block">Number of gifts</span>

                                    <div class="donate-counter">
                                        <button type="button" class="counter-btn counter-minus">
                                            <img class="img-fluid" src="{{ asset('images/minus.svg') }}" alt="" title="">
                                        </button>

                                        <input class="counter-input" value="0" type="number" min="0">

                                        <button type="button" class="counter-btn counter-plus">
                                            <img class="img-fluid" src="{{ asset('images/plus.svg') }}" alt="" title="">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
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
