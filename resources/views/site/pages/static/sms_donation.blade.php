@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/sliders-individual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/event-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        <div class="page-with-background-relative position-relative">
            @if($page->image)
                <img class="img-fluid d-none d-md-block"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <img class="img-fluid d-md-none"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <div class="page-background-content container-small">
                    <div class="white-right-block">
                        <span class="title-usual white-block-name">{{ $page->title ?? null }}</span>
                        <div class="text-default white-block-description">
                            {!! $page->content ?? null !!}
                            {{--Send SMS to <span class="orange">7700</span>  short number to enable us to respond to the most urgent needs. One SMS costs <span class="orange">500</span> AMD.--}}
                        </div>
                        @push('js')
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var $test = $('.white-block-description').html();
                                    $test = $test.replace('7700', '<span class="orange">7700</span> ');
                                    console.log($test)
                                    $('.white-block-description').html($test);

                                    var $test = $('.white-block-description').html();
                                    $test = $test.replace('500', '<span class="orange">500</span> ');
                                    console.log($test)
                                    $('.white-block-description').html($test);

                                });
                            </script>
                        @endpush
                        @include('site.components.share')
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-small my-margin other-gifts-slider-block">
        <h2 class="title-usual">{{ $page->title_content ?? null }}</h2>
        @if(count($news))
            <div class="container-small reports-slider-block">
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
                            @foreach($news as $item)
                                <div class="swiper-slide">
                                    @include('site.pages.news.card', ['item' => $item, 'swiper' => true])
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
    </div>
    @include('site.components.frequently_asked_questions')
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
