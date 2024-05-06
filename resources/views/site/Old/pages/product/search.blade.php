@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
    <h1 class="text-center my-3" style="font-size: 2rem">{{ request()->query('searchQuery') }}</h1>
    <div class="container mx-auto w-full flex relative pt-4">
        <div class="w-full relative mb-10">
            <div class="flex flex-col">
                <div class="flex-1 flex flex-wrap">
                    @if(count($items))
                        @foreach($items as $item)
                            <div class="w-1/2 xs:w-1/2 md:w-1/2  lg:w-1/4 xl:1/4 px-2 pb-2 flex h-auto">
                                @include('site.components.item-card')
                            </div>
                        @endforeach
                        <div class="w-full pagination-wrapper px-2">
                            {!! $items->links() !!}
                        </div>

                    @else
                        <div class="w-full">
                            <h2 class="text-center my-2">{{ t('Page items.no results') }}</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/product.js') }}"></script>
    <script src="{{ asset('js/viewModel-bundle.js') }}"></script>
@endsection
