@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
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
    </script>
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <div class="step-pages-construction d-flex flex-column">
                <span class="title-usual">{{ $item->title ?? null }}</span>
                @include('site.includes.steps.breadcrumbs._step1')
                <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                    <div class="step-white-block step-white-block-donate">
                        <form class="row w-100"
                              id="sponsored-child-general-info-form" action="{{ route('fundraisers.create.step1', ['url' => $item->url ?? null]) }}"
                              method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="col-12 col-left">
                                <div class="white-group-main w-100 d-flex flex-column">
                                    <span class="step-group-names">{{ __('frontend.Steps.Donation Amount') }}</span>
                                    <div class="mt-1 donate-step-buttons row">
                                        @foreach($prices as $key => $price)
                                            <div class="p-2 col-6 col-md-4">
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
                                        <div class="p-2 col-6 col-md-4 other-btn_click">
                                            <div class="step-button">
                                                <input class="form-check-input"
                                                       id="inp12"
                                                       type="radio"
                                                       name="radio_amount"
                                                       required
                                                       value="">
                                                <label class="form-check-label" for="inp12" >
                                                    <span>{{__('frontend.Steps.Other')}}</span>
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
                                    <div class="white-group-main">
                                    <span class="step-group-names d-flex align-items-center">
                                        {{ __('frontend.Fundraisers.Do you want to donate anonymously?') }}
                                    </span>
                                        <div class="step-group step-group-right">
                                            <label class="text-default custom-radio">
                                                <input type="radio" name="anonymous" required value="1">
                                                <span>{{ __('frontend.Fundraisers.Yes') }}</span>
                                            </label>
                                            <label class="text-default custom-radio">
                                                <input type="radio" name="anonymous" required checked value="0">
                                                <span>{{ __('frontend.Fundraisers.No') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="white-group-main">
                                        <textarea class="input-default textarea-default"
                                                  name="message"
                                                  placeholder="{{ __('frontend.Fundraisers.Comment') }}">{{ old('message') ?? null }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                    <button type="submit" class="button-orange">
                                        {{ __('frontend.Steps.Next') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection

{{--<div class="white-group-main donate-markup d-flex align-items-start">
  <img class="img-fluid" src="{{ asset('images/attention.png') }}" alt="" title="">
  <span class="markup-text ms-2">
      Նվիրաբերած գումարն օգտագործվելու է առաջին անհրաժեշտության կարիքների համար
  </span>
</div>--}}
