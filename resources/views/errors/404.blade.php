@extends('site.layouts.app')

@section('content')

<style>
    .page404 {
    max-width: 670px;
    margin: 130px auto 130px auto;
}

.description-usual {
    margin: 14px auto auto auto;
}

.button-orange2 {
    display: block;
    width: max-content;
    margin: 30px auto 0 auto;
    background-color: #F86A04;
    border-radius: 50px;
    font-size: 18px;
    /* font-family: "Lato-Bold"; */
    font-weight: 600;
    /* font-style: normal; */
    padding: 8px 26px;
    outline: none;
    border: none;
    color: #fff;
    transition: 0.4s all;
    -webkit-transition: 0.4s all;
    -moz-transition: 0.4s all;

}

@media (max-width: 575px) {
    .description-usual {
        margin: 4px auto auto auto;
    }

    .button-orange2 {
        margin: 24px auto 0 auto;
    }
}

</style>
    <div class="container-small page404 d-flex flex-column" >
        <img class="img-fluid" src="{{ asset('images/404.png') }}" alt="" title="">

        <h2 class="title-usual">{{__('frontend.Error.Page not found')}}</h2>
        <span class="description-usual">{{__('frontend.Error.This page doesn’t exist or is unavailable')}}</span>
        <a href="http://admin.astudio.laravel/" class="button-orange2 text-decoration-none">{{__('frontend.Error.Back to home page')}}</a>
    </div>
@endsection
