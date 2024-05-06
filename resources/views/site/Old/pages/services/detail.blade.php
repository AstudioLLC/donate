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
                @endif
                <div class="px-2 md:px-6 py-4">
                    <p class="text-gray-700 sm:text-sm text-xs">
                        {!! $item->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
