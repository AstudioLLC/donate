
@extends('site.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
{{--                <div class="col-md-6">--}}

                    <div class="reset_card_body block-style">
                        <div class="row login_head_row">
                           <span class="title-usual"> Reset your password?</span>
                        </div>
                        <div class="text-center">
                            <form class="reset-password-form w-100 d-flex flex-column align-items-center" action="{{ route('password.update',['email'=>$email,'token'=>$token]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

{{--                                <div class="form-group row reset_pas_input_block">--}}
{{--                                    --}}{{-- <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label> --}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <input type="text" id="email_address" class="input-default form-control  reset_inputs" placeholder="E-Mail Address" name="email" required autofocus>--}}
{{--                                        @if ($errors->has('email'))--}}
{{--                                            <span class="text-danger">{{ $errors->first('email') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group row reset_pas_input_block">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> --}}
                                    <div class="col-md-12">
                                        <input type="password" id="password" class="input-default form-control  reset_inputs" placeholder="Password" name="password" required autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{  __('auth.reset_failed') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row reset_pas_input_block">
                                    {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label> --}}
                                    <div class="col-md-12 mb-2">
                                        <input type="password" id="password-confirm" placeholder="Confirm Password" class="input-default form-control  reset_inputs" name="password_confirmation" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{  __('auth.reset_failed') }}</span>
                                        @endif
                                    </div>
                                    <span class="password-prompt" style="
                                                                line-height: 1;
                                                                color: #AEAEBB;
                                                                font-family: 'Lato-Regular';
                                                                font-weight: 700;
                                                                font-style: normal;
                                                                font-size: 14px;
                                                                text-align: left">
                                        {{ __('frontend.login.5 to 20 characters') }}</span>
                                </div>

                                <div class="col-md-12">
                                    <div class="pricing_purchase reset_btn">
                                        <button type="submit" class="reset_button button-orange button-orange-cancel">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
