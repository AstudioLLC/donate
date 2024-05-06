@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/gift-card.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        <div class="page-with-background-relative position-relative">
            @if($item->imageBig)
                <img class="img-fluid d-none d-md-block"
                     src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}"
                     alt="{{ $item->title }}"
                     title="{{ $item->title }}">
                <img class="img-fluid d-md-none"
                     src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}"
                     alt="{{ $item->title }}"
                     title="{{ $item->title }}">
                <div class="page-background-content container-small">
                    <div class="white-right-block">
                        <span class="title-usual white-block-name">{{ $item->title ?? null }}</span>
                        <span class="text-default white-block-description">
                            {!! Str::limit(strip_tags( $item->short,100)) !!}


                    </span>
                    @if($item->cost)
                        <span class="give-price-text">
                            {{ __('frontend.Gifts.Price:') }} {{ $item->cost }}  {{ __('frontend.Gifts.AMD') }}
                        </span>
                    @endif
                    <a class="white-block-sponsor-button text-decoration-none button-orange"
                       href="{{ route('gifts.create', ['url' => $item->url ?? null]) }}">
                        {{ __('frontend.Form.Give') }}
                    </a>
                    @include('site.components.share')
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-small my-margin other-gifts-slider-block">
        <h4 class="text-center">{{$item->title}}</h4>
        {!! $item->content !!}
    </div>
    @if(count($items))
        <div class="container-small my-margin other-gifts-slider-block">
            <h2 class="title-usual">{{ __('frontend.Gifts.Other gifts') }}</h2>
            <div class="individual-page-slider-wrapper d-flex align-items-center">
                <button class="swiper-button-prev individual-page-swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(0 11) rotate(-90)">
                            <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"></path>
                        </g>
                    </svg>
                </button>
                <div class="swiper-container individual-page-slider other-gifts-slider">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                            @include('site.pages.gifts.card', ['item' => $item, 'slider' => true])
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
    @include('site.components.frequently_asked_questions')
    @include('site.components.donate_now')
@endsection
