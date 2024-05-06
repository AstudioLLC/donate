@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('cms/css/product-detail.css') }}">
@endsection
@section('content')
    <div class="container py-2">
        <div class="w-full sm:block hidden">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <div id="collection-wrapper">
        @component('site.components.itemByCollection', [
                'collection' => $collection,
                'item' => $item,
                'item_gallery' => $item_gallery,
                'collection_gallery' => isset($collection_gallery) ? $collection_gallery : null,
                'countryFilters' => count($countryFilters) ? $countryFilters : null,
                'colorFilters' => count($colorFilters) ? $colorFilters : null,
                'filters' => count($filters) ? $filters : null,
            ])
        @endcomponent
    </div>

    @if(count($similiar_items) > 0)
        <section>
            <div class="container mx-auto mt-20">
                <div class="mx-3 my-5">
                    @include('site.components.title-no-more', ['title' => t('Page items.similar items')])
                </div>
                <div class="w-full relative py-3">
                    <div class="flex flex-col flex-col-reverse">
                        <div class="flex-1 flex flex-wrap">
                            @foreach($similiar_items as $similiar)
                                <div class="w-1/2 xs:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-2 pb-5 flex">
                                    @component('site.components.item-card', ['item' => $similiar])@endcomponent
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection

@section('js')
    <script src="{{ asset('js/detail.js') }}"></script>
    {{--<script>
        basketBundle.isProductView = true;
    </script>--}}
@endsection
