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
                <span class="title-usual">Sponsor a child</span>
                <div class="steps-breadcrumb-wrap d-flex justify-content-center align-items-center">
                    <div class="steps-breadcrumb d-flex align-items-center">
                        <div class="circle-wrap past-step d-flex flex-column align-items-center">
                            <div class="circle">
                                <span class="circle-number">1</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">General info</span>
                        </div>
                        <div class="steps-band past-step-band"></div>
                        <div class="circle-wrap active-step d-flex flex-column align-items-center">
                            <div class="circle circle-two">
                                <span class="circle-number">2</span>
                            </div>

                            <span class="circle-bottom-text d-none d-sm-block">Terms & Co.</span>
                            <span class="circle-bottom-text active-step-name d-sm-none">Terms & Co.</span>
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
                    <form class="w-100 step-white-block d-flex flex-column justify-content-center align-items-center" id="sponsored-child-terms-and-conditions-form-page-1" action="/" method="POST">
                        <span class="step-group-names">Terms and Condition</span>

                        <div class="step2-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.

                        </div>

                        <div class="step-2-checkbox d-flex justify-content-center align-items-center">
                            <input type="checkbox" class="custom-checkbox" id="step-2-check" name="step-2-check" value="yes">
                            <label class="text-default" for="step-2-check">I agree to the Terms and Conditions</label>
                        </div>

                        <div class="w-100 d-flex justify-content-center align-items-center step-2-next-btn">
                            <button class="button-orange">Next</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
