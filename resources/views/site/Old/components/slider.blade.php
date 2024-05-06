@if(count($slider))
    {{--<div class="home-top-swiper swiper-container" style="display:none;">
        <div class="swiper-wrapper">
            @foreach($slider as $item)
                <div class="swiper-slide">
                    <div class="relative">
                        <div class="home-slider-background" style="background-image:url('{{ $item->getImageUrl() }}')">
                            <div class="container relative h-full z-10">
                                <div class="absolute bottom-0 my-5 left-10">
                                    @if($item->top_text)
                                        <h2 class="text-white md:text-3xl text-xs font-bold">
                                            {{ $item->top_text }}
                                        </h2>
                                    @endif
                                    @if($item->bottom_text)
                                        <p class="text-white text-xs md:text-lg">
                                            {{ $item->bottom_text }}
                                        </p>
                                    @endif
                                    @if($item->url)
                                        <div class="md:py-5 py-2 flex">
                                            @if($item->url_text)
                                                <div class="relative mr-1">
                                                    <i class="fa fa-caret-left absolute text-xl text-white top-50 translate-rotate-50 right--7"
                                                       aria-hidden="true">
                                                    </i>
                                                    <button type="button" class="w-full md:text-sm text-xss py-0 md:py-3 md:h-10 h-5 md:px-3 px-1 bg-white rounded flex text-black items-center justify-center">
                                                        {{ $item->url_text }}
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="rounded w-auto px-2 ml-2 md:h-10 h-5 flex items-center justify-center border border-black-lighter bg-black-lighter">
                                                <a href="{{ $item->url }}"
                                                   title="{{ $item->top_text }}"
                                                   class="text-gray-dark md:text-sm text-xs items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.051" height="16.908" viewBox="0 0 24.051 16.908">
                                                        <path d="M16.2,4.93a.853.853,0,0,0-1.212,1.2l6.145,6.145H.86A.854.854,0,0,0,0,13.123a.864.864,0,0,0,.861.861H21.138l-6.145,6.134a.87.87,0,0,0,0,1.212.849.849,0,0,0,1.212,0l7.6-7.6a.855.855,0,0,0,0-1.2Z" transform="translate(0.001 -4.676)" fill="#fff"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="swiper-pagination pb-2 bottom-0 w-full swiper-pagination-white"></div>
                                <div class="swiper-button-next md:p-8 p-1 swiper-button-white">
                                    <i class="fa fa-arrow-right" aria-expanded="true"></i>
                                </div>
                                <div class="swiper-button-prev md:p-8 p-1 swiper-button-white">
                                    <i class="fa fa-arrow-left" aria-expanded="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>--}}

    {{--@push('css')
        <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    @endpush

    <div class="w-100 slider-main">
        <div class="untitled">
            <div class="untitled__slides">
                @foreach($slider as $row => $item)
                    <div class="untitled__slide" style="animation-delay: {{ $row * 5 }}s;">
                        <div class="untitled__slideBg" style="background-image:url('{{ $item->getImageUrl() }}')"></div>
                        <div class="untitled__slideContent">
                            @if($item->top_text)
                                <span>{{ $item->top_text }}</span>
                            @endif
                            @if($item->top_text)
                                <span>{{ $item->bottom_text }}</span>
                            @endif
                            @if($item->url_text)
                                <a class="button" href="{{ $item->url ? $item->url : 'javascript:void(0)' }}" target="_blank">
                                    {{ $item->url_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="untitled__shutters"></div>
        </div>
    </div>--}}


    <div class="w-100 slider-main">
        <div class="split-slideshow">
            <div class="slideshow">
                <div class="slider">
                    @foreach($slider as $item)
                        <div class="item">
                            <img src="{{ $item->getImageUrl() }}"/>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="slideshow-text">
                @foreach($slider as $item)
                    @if($item->url_text)
                        <div class="item">
                            <a class="button" href="{{ $item->url ? $item->url : 'javascript:void(0)' }}" target="_blank">
                                {{ $item->url_text }}
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    @push('css')
        <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('js/slider.js') }}"></script>
    @endpush

@endif
