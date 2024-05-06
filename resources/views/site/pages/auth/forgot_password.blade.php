@extends('site.layouts.app')

@section('content')

    <div class="forgot-password block-style">
        @if($errors->has('email'))
            <div class="alert alert-danger mb2 text-center">
            <span >{{ $errors->first('email') }}</span>
            </div>
        @endif
        <div class="forgot-content">
            <span class="title-usual">
                {{ __('frontend.login.Forgot your password?') }}
            </span>
            <span class="description-usual">
                {{ __('frontend.login.Forgot password text') }}
            </span>
        </div>

        <form class="forgot-password-form w-100 d-flex flex-column align-items-center"
              action="{{ route('password.email') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <input class="input-default"
                   type="email"
                   name="email"
                   required
                   value="{{ old('email') }}"
                   placeholder="{{ __('frontend.login.Email') }}">
            <div class="d-flex justify-content-between align-items-center forgot-password-btn-group">
                <button type="submit" class="button-orange">
                    {{ __('frontend.login.Submit') }}
                </button>
{{--                <button type="reset" class="button-orange button-orange-cancel">--}}
{{--                    {{ __('frontend.login.Cancel') }}--}}
{{--                </button>--}}
            </div>
        </form>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/frontend/demo-modals.css') }}">
    @endpush

    <!--Start Modal Reset Email Verify -->
    <div class="donate-modal justify-content-center align-items-center thank-you" id="myModal">
        <div class="donate-modal-white donate-modal-white-thank-you d-flex align-items-center position-relative">
            <div class="modal-image">
                <img class="w-100" src="{{ asset('images/thank-you.png') }}" alt="" title="" id="close-modal-sp">
            </div>

            <div class="donate-modal-content d-flex flex-column align-items-center thank-you-modal-content">
                <span class="title-usual">{{__('frontend.Payment.Thank you')}}</span>
                <span class="description-usual">
                    {{ __('frontend.cabinet.Reset Email Verify') }} - {{session()->get('email') ?? null}}
                </span>

            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute" id="to_close">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>
        </div>
    </div>
    <!--End Modal Reset Email Verify -->

@endsection
@if(session()->has('toastr_notifications'))
@push('js')
    <script>
            $('#myModal').addClass("donate-modal-opened");
            // $('#close-modal-sp').removeClass("donate-modal-opened");
            $("#to_close").click(function(){
              $('#myModal').removeClass("donate-modal-opened");
            });

    </script>
@endpush
@endif
