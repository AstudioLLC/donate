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
                    @include('site.includes.steps.breadcrumbs._step2')
                    @include('site.includes.steps.forms._step2', ['route' => route('cabinet.sponsorship.create.step2')])
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
