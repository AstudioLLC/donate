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
                    <img class="w-full" src="{{ $item->getImageUrl('thumbnail') }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                @endif
                @if($item->description)
                    <div class="px-2 md:px-6 py-4">
                        <p class="text-gray-700 sm:text-sm text-xs">
                            {!! $item->description !!}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if(count($item->items))
        <section>
            <div class="container mx-auto mt-20">
                <div class="w-full relative py-3">
                    <div class="flex flex-col flex-col-reverse">
                        <div class="flex-1 flex flex-wrap">
                            @foreach($item->items as $item)
                                @if($item->active == 1)
                                    <div class="w-1/2 xs:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-2 pb-5 flex">
                                        @component('site.components.item-card', ['item' => $item])@endcomponent
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
