@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/news-and-events-individual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/event-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small d-flex flex-column">
            <a href="{{ url()->previous() }}" class="back-to-news d-flex align-items-center text-decoration-none">
                <img class="img-fluid me-2 me-lg-3"
                     src="{{ asset('images/left-arrow.svg') }}"
                     alt="{{ __('frontend.Back') }}"
                     title="{{ __('frontend.Back') }}">
                {{ __('frontend.Back') }}
            </a>
            <span class="title-usual">{{ $item->title }}</span>
            <span class="news-date">{{ $item->created_at->format('d/m/Y') }}</span>
            @if($item->imageBig)
                <div class="news-image-wrap">
                    <img class="img-fluid"
                         src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}"
                         alt="{{ $item->title }}"
                         title="{{ $item->title }}">
                </div>
            @endif
            <div class="news-description text-default">
                {!! $item->content !!}
            </div>
            @include('site.components.share')
        </div>
    </div>


    @if(count($items))
        <div class="container-small my-margin other-news-slider-block">
            <h2 class="title-usual"> {{ __('frontend.Other news') }}</h2>
            <div class="individual-page-slider-wrapper d-flex align-items-center">
                <button class="swiper-button-prev individual-page-swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(0 11) rotate(-90)">
                            <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"></path>
                        </g>
                    </svg>
                </button>
                <div class="swiper-container individual-page-slider other-news-slider">
                    <div class="swiper-wrapper">
                        @foreach($items as $newsCard)
                            <div class="swiper-slide">
                                @include('site.pages.news.card', ['item' => $newsCard, 'swiper' => true])
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="swiper-button-next individual-page-swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(-97.141 11.001) rotate(-90)">
                            <path d="M5.5,103.141a.786.786,0,0,1-.545-.216L.226,98.4a.715.715,0,0,1,0-1.042.8.8,0,0,1,1.089,0l4.185,4,4.185-4a.8.8,0,0,1,1.089,0,.715.715,0,0,1,0,1.042l-4.73,4.526A.786.786,0,0,1,5.5,103.141Z" transform="translate(0 0)" fill="#0a0a0a"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if(count($item->gallery))
        @include('site.components.gallery', ['items' => $item->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
