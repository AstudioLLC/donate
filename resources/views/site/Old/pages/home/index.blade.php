@extends('site.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush
@section('content')
    @if(count($slider))
        <div class="w-100">
            @component('site.components.slider', ['slider' => $slider , 'home' => true])@endcomponent
        </div>
    @elseif(count($videos))
        <div class="w-100">
            @component('site.components.video', ['video' => $videos , 'home' => true])@endcomponent
        </div>
    @endif

    @if(count($brands))
        <section class="mt-10 mb-12">
            <div class="container mx-auto">
                @component('site.components.brands', ['brands' => $brands])@endcomponent
            </div>
        </section>
    @endif

    @if(count($homeBanners))
        <section class="mt-5 pt-5">
            <div class="container relative">
                    <div class="swiper-container md:w-11/12 w-10/12 home-categories">
                        <div class="swiper-wrapper">
                            @foreach($homeBanners as $banner)
                                <div class="swiper-slide h-auto">
                                    <div class="relative img-gradient image-hover h-full">
                                        <a href="{{ $banner->url }}{{--{{ route('products.list', ['category' => $category->alias]) }}--}}" class="text-decoration-none">
                                            <div class="relative h-full">
                                                @if($banner->image)
                                                    <img src="{{ $banner->getImageUrl() }}" class="w-full h-full" alt="{{ $banner->title }}" title="{{ $banner->title }}">
                                                @else
                                                    <img src="{{asset('images/unnamed.png')}}" class="w-full h-full" alt="{{ $banner->title }}" title="{{ $banner->title }}">
                                                @endif
                                            </div>
                                            <div class="absolute bottom-5 z-10 left-5">
                                                <p class="text-white">{{ $banner->title }}</p>
                                                <div class="md:my-5 my-2 hover-block flex">
                                                    <div class="relative mr-1">
                                                        <i class="fa fa-caret-left absolute text-xl text-white top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
                                                        <button type="button" class="w-full md:text-sm text-xss py-0 md:py-3 h-10 md:px-3 px-1 bg-white rounded flex text-black items-center justify-center">
                                                            {{ $banner->button_title }}
                                                        </button>
                                                    </div>
                                                    <div class="rounded w-auto px-2 ml-2 h-10 flex items-center justify-center border border-black-lighter bg-black-lighter">
                                                        <a href="{{ $banner->url }}{{--{{ route('products.list', ['category' => $category->alias]) }}--}}" class="text-gray-dark md:text-sm text-xs items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.051" height="16.908" viewBox="0 0 24.051 16.908">
                                                                <path d="M16.2,4.93a.853.853,0,0,0-1.212,1.2l6.145,6.145H.86A.854.854,0,0,0,0,13.123a.864.864,0,0,0,.861.861H21.138l-6.145,6.134a.87.87,0,0,0,0,1.212.849.849,0,0,0,1.212,0l7.6-7.6a.855.855,0,0,0,0-1.2Z" transform="translate(0.001 -4.676)" fill="#fff"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next w-2/3 relative bg-white next_categories md:p-8 p-1 swiper-button-white">
                        <i class="fa fa-angle-right" aria-expanded="true"></i>
                    </div>
                    <div class="swiper-button-prev relative prev_categories md:p-8 p-1 swiper-button-white">
                        <i class="fa fa-angle-left" aria-expanded="true"></i>
                    </div>
                </div>
        </section>
    @endif

    @if(count($discountItems))
        <section class="mt-5">
            <div class="container mx-auto">
                @include('site.components.title-no-more', ['title' => t('Page home.discounts')])
                <div class="swiper-container sale">
                    <div class="swiper-wrapper">
                        @foreach($discountItems as $item)
                            <div class="swiper-slide flex my-2 shadow-over border-gray h-auto">
                                @include('site.components.item-card')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($promotiontItems))
        <section class="mt-12">
            <div class="container mx-auto">
                @include('site.components.title-no-more', ['title' => t('Page home.promotions')])
                <div class="swiper-container discount">
                    <div class="swiper-wrapper">
                        @foreach($promotiontItems as $item)
                            <div class="swiper-slide flex my-2 shadow-over shadow border-gray h-auto">
                                @include('site.components.item-card')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($newItems))
        <section class="mt-12">
            <div class="container mx-auto">
                @include('site.components.title-no-more', ['title' => t('Page home.new items')])
                <div class="swiper-container new">
                    <div class="swiper-wrapper">
                        @foreach($newItems as $item)
                            <div class="swiper-slide flex my-2 shadow-over home-page-slider shadow border-gray h-auto">
                                @include('site.components.item-card')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(isset($home_big_image_banners))
        @if($home_big_image_banners->content[0]->image)
            <section class="mt-12">
                <div class="container mx-auto">
                    @if($home_big_image_banners->content[0]->url)
                        <a href="{{ $home_big_image_banners->content[0]->url }}">
                            <div class="w-full full-gradient">
                                <img src="{{ asset('u/banners/' . $home_big_image_banners->content[0]->image) }}" class="max-w-full w-full object-cover h-full" alt="">
                                <div class="absolute bottom-0 md:my-5 my-1 z-10 left-3">
                                    @if($home_big_image_banners->content[0]->title)
                                        <h2 class="text-white md:text-2xl text-xs font-bold">
                                            {{ $home_big_image_banners->content[0]->title }}
                                        </h2>
                                    @endif
                                    @if($home_big_image_banners->content[0]->text)
                                        <p class="text-white md:text-base text-xs">
                                            {{ $home_big_image_banners->content[0]->text }}
                                        </p>
                                    @endif
                                    <div class="md:my-5 my-0 flex">
                                        @if($home_big_image_banners->content[0]->url)
                                            <div class="rounded w-auto mr-1 relative md:px-3 px-2 md:h-10 h-5 flex items-center justify-center border border-black-light bg-black-light">
                                                <i class="fa fa-caret-left absolute text-xl text-black-light top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
                                                <button type="button" class="text-gray-dark md:text-sm text-xs items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.051" height="16.908" viewBox="0 0 24.051 16.908">
                                                        <path d="M16.2,4.93a.853.853,0,0,0-1.212,1.2l6.145,6.145H.86A.854.854,0,0,0,0,13.123a.864.864,0,0,0,.861.861H21.138l-6.145,6.134a.87.87,0,0,0,0,1.212.849.849,0,0,0,1.212,0l7.6-7.6a.855.855,0,0,0,0-1.2Z" transform="translate(0.001 -4.676)" fill="#fff"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endif
                                        @if($home_big_image_banners->content[0]->url_text)
                                            <div class="relative">
                                                <button type="button" class="w-full md:text-sm text-xss py-0 md:py-3 md:h-10 h-5 md:px-3 px-1 bg-white rounded flex text-black items-center justify-center">
                                                    {{ $home_big_image_banners->content[0]->url_text }}
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
            </section>
        @endif
    @endif

    @if(isset($home))
        <section class="mt-12">
            <div class="container mx-auto">
                @if(isset($home->main_banner[0]->title))
                    <h1 class="text-black-lighter font-bold text-sm sm:text-lg pb-5">{{ $home->main_banner[0]->title }}</h1>
                @endif
                @if(isset($home->main_banner[0]->content))
                    <div class="w-full text-sm sm:text-base">
                        <p>
                            {!! $home->main_banner[0]->content !!}
                        </p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if(count($services))
        <section class="mt-5">
            <div class="container mx-auto">
                @include('site.components.title-no-more', [
                    'title' => t('Page home.services'),
                ])
                <div class="w-full flex flex-wrap">
                    @foreach($services as $service)
                        <div class="xl:w-1/6 lg:w-1/3 w-1/2">
                            <a href="{{--{{ route('services.detail', ['url' => $service->url]) }}--}}{{ $service->url ? $service->url : 'javascript:void(0)' }}">
                                <div class="sm:m-2 m-1 h-auto border border-gray bg-white rounded shadow flex flex-col justify-center items-center">
                                    <div class="my-10 sm:w-22 sm:h-22 h-16 w-16 p-2 px-1 flex justify-center items-center border-2 border-black-lighter transform rotate-45">
                                        <div class="flex justify-center items-center bg-gray w-full h-full m-1">
                                            @if($service->icon)
                                                <img class="transform -rotate-45" src="{{ $service->getIconUrl('small') }}" alt="{{ $service->title }}">
                                            @else
                                                <img class="transform -rotate-45" src="{{ asset('images/present.svg') }}" alt="{{ $service->title }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div href="{{--{{ route('services.detail', ['url' => $service->url]) }}--}}{{ $service->url ? $service->url : 'javascript:void(0)' }}" class="py-5 px-2 lg:text-lg text-xs font-bold text-black-light">
                                        {{ $service->title }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(count($news))
        <section class="mt-5">
            <div class="container mx-auto">
                @if($staticNews)
                    @include('site.components.title-no-more',
                    [
                        'title' => $staticNews->title,
                        'href' => route('page', ['url' => $staticNews->static])
                    ])
                @endif
                <div class="w-full flex flex-wrap justify-start items-stretch py-4">
                    @foreach($news as $item)
                        <div class="xl:w-1/3 p-2 sm:w-1/2 w-full h-auto flex">
                            @include('site.components.news', ['item' => $item])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
