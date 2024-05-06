@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
    <style>
        /*input[name=radio_amount] {*/
        /*    display: none;*/
        /*}*/
    </style>
@endpush
@push('js')
    <script>
        $('input[name=radio_amount]').click(function () {
            let val = $(this).val();
            if (val === 'other') {

                $('.other-amount-input').removeClass('d-none');
                $('input[name=other_amount]').attr('required', true).focus();
            } else {
                $(".input-default").val(" ");
                $('.other-amount-input').addClass('d-none');
                $('input[name=other_amount]').removeAttr('required');
            }
        })

        $(".step-button").click(function(){
            $(".step-button").removeClass("step-button-selected")
            $(this).addClass("step-button-selected");
        });

        $(function() {
            $(".frequency_manually").click(function() {
                $('#auto_check').addClass("d-none");
                $('#auto_check_input').prop('checked',false)
                $('#manually_check').prop('checked',true)
                $('#binding_info').addClass('d-none');
            });
        });
        $(function() {
            $("#manually_check").click(function() {
                $('#binding_info').addClass('d-none');
            });
            $("#auto_check_input").click(function() {
                $('#binding_info').removeClass('d-none');
            });
        });
    </script>
@endpush
@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>
            <div class="profile-content-right">
                <div class="step-pages-construction d-flex flex-column">
                    <span class="title-usual">{{ __('frontend.cabinet.New Sponsorship') }}</span>
                    @include('site.includes.steps.breadcrumbs._step1')
                    @extends('site.layouts.app')

                    @push('css')
                        <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/frontend/home-sponsor-a-child.css') }}">
                    @endpush

                    @section('content')
                        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

                        <div class="page-wrap">
                            <div class="container-small profile-content">
                                <div class="left-panel-wrap d-none d-lg-flex">
                                    @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
                                </div>

                                <div class="profile-content-right">
                                    <div class="step-pages-construction d-flex flex-column">
                                        <span class="title-usual text-start">{{ __('frontend.Search.Sponsor a Child') }}</span>
                                        <div class="steps-breadcrumb-wrap d-flex justify-content-start align-items-center">
                                            <div class="steps-breadcrumb d-flex align-items-center">
                                                <div class="circle-wrap active-step d-flex flex-column align-items-start">
                                                    <div class="circle">
                                                        <span class="circle-number">1</span>
                                                    </div>

                                                    <span class="circle-bottom-text d-none d-sm-block"> {{ __('frontend.Steps.General info') }}</span>
                                                </div>
                                                <div class="steps-band"></div>
                                                <div class="circle-wrap d-flex flex-column align-items-center">
                                                    <div class="circle circle-two">
                                                        <span class="circle-number">2</span>
                                                    </div>

                                                    <span class="circle-bottom-text d-none d-sm-block">{{ __('frontend.Steps.Terms & Co') }}</span>
                                                    <span class="circle-bottom-text active-step-name d-sm-none">{{ __('frontend.Steps.General info') }}</span>
                                                </div>
                                                <div class="steps-band"></div>
                                                <div class="circle-wrap d-flex flex-column align-items-end">
                                                    <div class="circle circle-two">
                                                        <span class="circle-number">3</span>
                                                    </div>

                                                    <span class="circle-bottom-text d-none d-sm-block">{{ __('frontend.Steps.Billing Info') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                                            <div class="step-white-block">
                                                <form class="row w-100" id="sponsored-child-general-info-form-page-1"
                                                      action="{{route('cabinet.donate.create.step1')}}"
                                                      method="POST">
                                                    @csrf
                                                    <div class="col-12 col-md-6 col-left">
                                                        <div class="white-group-main w-100 d-flex flex-column">
                                                            <span class="step-group-names">{{ __('frontend.Form.Donation Amount') }}</span>
                                                            <div class="mt-1 donate-step-buttons row">
                                                                @foreach($prices as $key => $price)
                                                                    <div class="p-2 col-6 col-md-5">
                                                                        <div class="step-button">
                                                                            <input class="form-check-input"
                                                                                   id="inp{{$key}}"
                                                                                   type="radio"
                                                                                   name="radio_amount"
                                                                                   required
                                                                                   value="{{$price}}">
                                                                            <label class="form-check-label" for="inp{{$key}}" >
                                                                                {{$price}} <span>&nbsp;{{ __('frontend.Gifts.AMD') }}</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <div class="p-2 col-6 col-md-5 other-btn_click">
                                                                    <div class="step-button">
                                                                        <input class="form-check-input"
                                                                               id="inp12"
                                                                               type="radio"
                                                                               name="radio_amount"
                                                                               required
                                                                               value="">
                                                                        <label class="form-check-label" for="inp12" >
                                                                            <span>{{ __('frontend.Steps.Other') }}</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                    <div class="p-2 form-group mb-2 other-amount-input d-none">
                                                                        <input class="input-default"
                                                                               id="inp6"
                                                                               min="1"
                                                                               type="number"
                                                                               name="other_amount"
                                                                               value="{{ old('other_amount') }}">
                                                                        <span class="other_input_cross">
                                                                       <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-xmark fa-xl"><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" class=""></path></svg>
                                                                    </span>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="white-group-main w-100 d-flex flex-column">
                                                            {{--                                        <span class="step-group-names">Whom do you want to sponsor?</span>--}}
                                                            <div class="form-group">
                                                                <select class="new_style_select nwsl1" name="children_id">
                                                                    <option selected disabled>{{ __('frontend.Form.Enter child ID') }}</option>
                                                                    @foreach($childrens as $children)
                                                                        <option @if($children->id == request()->id) selected @endif value="{{$children->id}}">{{$children->child_id}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                        <div class="col-12 col-md-6 col-right">
                                                            <div class="white-group-main w-100 d-flex flex-column">
                                                                <span class="step-group-names d-flex align-items-center">
                                                                    {{ __('frontend.Form.Recurring payment') }}
                                                                </span>
                                                                <div class="step-group step-group-right">
                                                                    <label class="text-default custom-radio" id="auto_check" >
                                                                        <input name="recurring_payment" type="radio" id="auto_check_input" value="1" required checked>
                                                                        <span>{{ __('frontend.Form.Automatic') }}</span>
                                                                    </label>
                                                                    <label class="text-default custom-radio">
                                                                        <input name="recurring_payment"  id="manually_check" type="radio" value="0" required>
                                                                        <span>{{ __('frontend.Form.Manually') }}</span>
                                                                    </label>
                                                                </div>
                                                                <span class="text-danger" style="font-size: 11px" id="binding_info">{!! __('frontend.Form.Recurring payment info text') !!}</span>
                                                            </div>
                                                        </div>

                                                    <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                                        <button type="submit" class="button-orange" style="margin-right: auto">{{ __('frontend.Steps.Next') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('site.components.donate_now')
                    @endsection

                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection

