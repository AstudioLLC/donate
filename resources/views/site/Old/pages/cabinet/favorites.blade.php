@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@push('js')
    <script>
        basketCalculator.isBigBasket = true;
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="sm:flex hidden">
            @include('site.components.breadcrumb')
        </div>
        <div class="w-full flex xl:flex-row flex-col">
            @if(authUser())
                <div class="w-full xl:w-1/5 mb-3 sm:mb-8 flex bottom-0 left-0 bg-white">
                    <div class="sm:flex hidden">
                        @include('site.pages.cabinet.components.cabinet')
                    </div>
                    <div class="xl:hidden p-2 flex items-center">
                        <a href="">
                            <i class="fa fa-arrow-left" aria-expanded="true"></i>
                        </a>
                        <img class="p-2" src="{{ asset('images/shopping-cart.svg') }}" alt="">
                        <h1 class="p-2">Favorites</h1>
                    </div>
                </div>
            @endif

            @if(count($items))
                <section>
                    <div class="container">
                        <div class="flex-1 flex flex-wrap my-5">
                            @foreach($items as $item)
                                <div class="w-1/2 xs:w-1/2 md:w-1/2 lg:w-1/4 xl:1/4 px-2 pb-2 flex h-auto">
                                    @include('site.components.item-card')
                                </div>
                            @endforeach
                            <div class="w-full pagination-wrapper px-2">
                                {!! $items->links() !!}
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <h2 class="text-center w-full my-5">{{ t('Page items.no results') }}</h2>
            @endif
        </div>
    </div>
@endsection
