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
                    <span class="title-usual" style="text-align: left">{{ __('frontend.Search.Sponsor a Child') }}</span>
                    @include('site.includes.steps.breadcrumbs._step1')
                    @include('site.includes.steps.forms._step1', ['route' => route('cabinet.sponsorship.create.step1')])
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
