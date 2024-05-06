@extends('site.layouts.app')


@section('content')
    <div class="forgot-password block-style">
        <div class="forgot-content">
            <span class="title-usual">Forgot Password?</span>
            <span class="description-usual">Enter the email address used for registration and we'll send you a new password</span>
        </div>

        <form class="forgot-password-form w-100 d-flex flex-column align-items-center">
            <input type="email" name="name" class="input-default" placeholder="Email Address">

            <div class="d-flex justify-content-between align-items-center forgot-password-btn-group">
                <button class="button-orange" type="submit">Submit</button>
                <a href="" class="button-orange button-orange-cancel text-decoration-none">Cancel</a>
            </div>
        </form>
    </div>
@endsection
