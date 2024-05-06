@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center">
        <div class="w-full ">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <section class="mt-20">
        <div class="container">
            <div class="w-full relative flex flex-col justify-center shadow-lg">
                <div class="px-3 absolute -mt-8 w-full top-0">
                    <div class="w-full rounded flex font-bold text-blue items-center h-16 px-5 bg-white shadow-over">
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
                @if($item->image)
                    <img class="w-full" src="{{ $item->getImageUrl('thumbnail') }}" alt="{{ $item->image_alt }}" title="{{ $item->image_title }}">
                @else
                    <img class="w-full" src="{{ asset('images/news-bg.jpg') }}" alt="{{ $item->image_alt }}" title="{{ $item->image_title }}">
                @endif
                <div class="px-2 md:px-6 py-4">
                    <div class="flex flex-col items-start justify-center">
                        <div class="-mt-16  w-auto">
                            <div class="relative">
                                <img src="{{ asset('images/news-bg.png') }}" alt="{{ $item->title }}">
                                <p class="absolute translate-y-50 flex justify-center w-full font-medium items-center top-50 text-black-lighter text-xs lg:text-md">
                                    {{ $item->created_at->format('d.m.Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 sm:text-sm text-xs">
                        {!! $item->content !!}
                    </p>
                </div>
            </div>
            @if(count($gallery))
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
