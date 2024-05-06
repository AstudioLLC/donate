@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/step-pages.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/profile-my-fundraiser.css') }}">
@endpush

{{--@push('js')--}}

{{--@endpush--}}

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right fundraiser-page d-flex flex-column">
                <div class="fundraiser-block d-flex flex-column">
                    <span class="title-usual text-start">My fundraisers</span>

                    <div class="fundraiser-top">
                        <img class="img-fluid" src="{{ asset('images/fundraiser-img.png') }}" alt="" title="">

                        <div class="d-flex flex-column fundraiser-top-progressbar">
                            <span class="title-usual text-start">Lorem Ipsum</span>
                            <span class="title-bottom text-start">Lorem Ipsum Dolor</span>
                            @include('site.components.progressbar')
                        </div>
                    </div>

                    <div class="description-usual">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                        into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                        of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum.
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                        'Content here, content here', making it look like readable English․ Read More
                    </div>

                    <button class="button-orange">Donate</button>
                </div>

                <div class="fundraiser-block d-flex flex-column">
                    <div class="fundraiser-top">
                        <img class="img-fluid" src="{{ asset('images/fundraiser-img.png') }}" alt="" title="">

                        <div class="d-flex flex-column fundraiser-top-progressbar">
                            <span class="title-usual text-start">Lorem Ipsum</span>
                            <span class="title-bottom text-start mt-0">Lorem Ipsum Dolor</span>
                            @include('site.components.progressbar')
                        </div>
                    </div>

                    <div class="description-usual">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                        into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                        of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum.
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                        'Content here, content here', making it look like readable English․ Read More
                    </div>

                    <button class="button-orange button-orange-white">See reports</button>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
