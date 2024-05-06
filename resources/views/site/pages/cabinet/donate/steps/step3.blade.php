@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
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
                    @include('site.includes.steps.breadcrumbs._step3')

                    <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                        <div class="step-white-block">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="step-group-names">{{ __('frontend.Steps.Billing Info') }}</span>
                            </div>
                            <form class="row w-100 mt-4"
                                  id="billing-info-form-page-1"
                                  action="{{ route('cabinet.donate.create.step3') }}"
                                  method="POST">
                                @csrf
                                <div class="col-12 col-md-6 col-left">
                                    <div class="default-form-group">
                                        <input type="text"
                                               class="input-default"
                                               name="name"
                                               required
                                               placeholder="* {{ __('frontend.login.Name') }}"
                                               value="{{ old('name', $user->name ?? null) }}">
                                        @if($errors->has('name'))
                                            <span class="input-alert">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    {{--<div class="default-form-group">
                                        <input name="surname" type="text" class="input-default" placeholder="* Surname*">
                                    </div>--}}
                                    <div class="default-form-group">
                                        <input type="text"
                                               class="input-default"
                                               name="phone"
                                               required
                                               placeholder="* {{ __('frontend.login.Phone number') }}"
                                               value="{{ old('phone', $user->phone ?? null) }}">
                                        @if($errors->has('phone'))
                                            <span class="input-alert">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="default-form-group">
                                        <input type="email"
                                               class="input-default"
                                               name="email"
                                               placeholder="* {{ __('frontend.login.Email') }}"
                                               value="{{ old('email', $user->email ?? null) }}">
                                        @if($errors->has('email'))
                                            <span class="input-alert">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-right billing-info-col-right">

                                    @if(count($countries))
                                        <div class="form-group mt-0 ">
                                            <select class="new_style_select nwsl1" name="country_id">
                                                <option value="" selected disabled>
                                                    {{ __('frontend.cabinet.Choose country') }}
                                                </option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" @if(isset($user->options->country_id) && $user->options->country_id == $country->id) selected @endif>
                                                        {{ $country->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('country_id'))
                                                <span class="input-alert">{{ $errors->first('country_id') }}</span>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="default-form-group">
                                        <input type="text"
                                               class="input-default"
                                               name="city"
                                               placeholder="{{ __('frontend.login.City') }}"
                                               value="{{ old('city') }}">
                                        @if($errors->has('city'))
                                            <span class="input-alert">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="default-form-group">
                                        <input type="text"
                                               class="input-default"
                                               name="address"
                                               placeholder="{{ __('frontend.login.Address') }}"
                                               value="{{ old('address') }}">
                                        @if($errors->has('address'))
                                            <span class="input-alert">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="payment-methods-radio">
                                        <div class="payments-description-top">
                                            {{__('frontend.Form.Additional 2%')}}
                                        </div>

                                        <div class="ratio-group">
                                            <div class="ratio-block ratio-block-click">
                                                <input class="payment-custom-radio payment_checked_inp" value="arca" name="payment_type" type="radio" id="payment-label-radio" checked>
                                                {{--                            <label for="payment-label-ratio"></label>--}}
                                                <label for="payment-label-radio" class="redio_btn"></label>
                                                <div class="payment-icons">
                                                    <label for="payment-label-radio">
                                                        <img class="img-fluid" src="{{ asset('images/paymentimg1.png') }}">
                                                        <img class="img-fluid" src="{{ asset('images/paymentimg2.png') }}">
                                                        <img class="img-fluid" src="{{ asset('images/paymentimg3.png') }}">
                                                        <img class="img-fluid" src="{{ asset('images/paymentimg4.png') }}">
                                                    </label>
                                                </div>
                                            </div>
                                            @if(session('sponsorship')['recurring_payment'] == 0)
                                            <div class="ratio-block ratio-block-click">
                                                <input class="payment-label-radio payment_checked_inp" value="idram" name="payment_type"  type="radio" id="payment-label-radio2">
                                                {{--                            <label for="payment-label-ratio2"></label>--}}
                                                <label for="payment-label-radio2" class="redio_btn"></label>
                                                <div class="payment-icons">
                                                    <label for="payment-label-radio2">
                                                        <img class="img-fluid" src="{{ asset('images/paymentimg5.png') }}">
                                                    </label>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="step-3-checkbox d-flex justify-content-center align-items-center mt-3">
                                    <input type="checkbox" class="custom-checkbox" id="step-3-check" name="subscriber_checkbox">
                                    <label class="text-default" for="step-3-check">
                                        {{ __('frontend.Steps.Please send me the latest news from donate am') }}
                                    </label>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-4 button-orange-group">
                                    {{--                <button type="submit" class="button-orange" value="arca" name="payment_type">--}}
                                    {{--                    {{ __('frontend.Steps.Pay Arca') }}--}}
                                    {{--                </button>--}}
                                    {{--                <button type="submit" class="button-orange" value="idram" name="payment_type">--}}
                                    {{--                    {{ __('frontend.Steps.Pay Idram') }}--}}
                                    {{--                </button>--}}
                                    <button type="submit" class="button-orange payment_btn" name="payment_btn">
                                        {{ __('frontend.Steps.Pay') }}
                                    </button>
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
