@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/mailing-page.css') }}">
@endpush

@section('content')
    <div class="mailing-page">
        <div class="mailing-page-content d-flex flex-column justify-content-center align-items-center">
            <div class="mailing-logo-wrap">
                <img class="img-fluid" src="{{ asset('images/logo-fixed.png') }}" alt="" title="">
            </div>
            <div class="mailing-white-block">
                <div class="mailing-white-block-content d-flex flex-column justify-content-center align-items-center">
                    <span class="title-usual">Reset your password</span>
                    <span class="description-usual">
                        If you're lost your password or wish to reset it, use the link below to get started.
                    </span>
                    <button class="button-orange">Reset Your Password</button>

                    <span class="reset-text-gray">
                        If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
