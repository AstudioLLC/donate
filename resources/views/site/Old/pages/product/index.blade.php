@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center mt-3">
        <div class="w-full lg:w-5/6">
            @include('site.components.breadcrumb')
        </div>
        <div class="w-3/12 lg:max-w-menu  block lg:hidden "><img src="{{ asset('images/filter.svg') }}" alt="Filters"></div>
        <div class="lg:w-3/12 sm:w-4/3 w-3/4 pl-10 relative">
            <select id="sortProducts"
                class="block appearance-none w-full bg-white shadow border border-gray py-3 px-4 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="3">{{ t('Page items.sort by') }}</option>
                <option value="2">{{ t('Page items.sort by price asc') }}</option>
                <option value="1">{{ t('Page items.sort by price desc') }}</option>
                <option value="4">{{ t('Page items.sort by new items') }}</option>
                <option value="5">{{ t('Page items.sort by discount desc') }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-10 flex items-center px-5 text-gray-700">
                <i class="fa fa-angle-down" aria-expanded="true"></i>
            </div>
        </div>
    </div>
    <div class="container mx-auto w-full flex relative pt-4">
        <div class="overflow-auto lg:w-3/12 lg:max-w-menu hidden lg:block bg-white absolute lg:static z-10 w-full">
            <div class="flex flex-col">
                <div class=" pr-6 pb-5">
                    <p class="pl-2 font-bold mb-3">{{ $category->name }}</p>
                    <ul class="divide-y pl-2 divide-gray">
                        @if(isset($category->parent->children) && count($category->parent->children))
                            @foreach($category->parent->children as $child)
                                <li class="py-2">
                                    <a href="{{ route('products.list', ['category' => $child->alias]) }}">{{ $child->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @if(count($countryFilters))
                    <div class="filters-container">
                        <div class="border-gray border rounded mb-3 mt-3 p-3">
                            <p class="pl-2 font-bold mb-3">{{ t('Page items.filter country') }}</p>
                            <div class="bg-gray-200">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="flex flex-col pl-2 w-full">
                                        @foreach($countryFilters as $countryFilter)
                                            <label class="inline-flex items-center pointer mt-3 size-bar">
                                                <input type="checkbox" class="form-checkbox text-blue h-4 w-4 country-select-input" value="{{ $countryFilter->id }}">
                                                @if($countryFilter->image)
                                                    <span class="ml-2">
                                                        <img src="{{ $countryFilter->getImageUrl('small') }}" class="img-responsive" alt="{{ $countryFilter->name }}" width="21" height="16">
                                                    </span>
                                                @endif
                                                <span class="ml-2 text-gray-700">
                                                    {{ $countryFilter->name }}
                                                </span>
                                            </label>
                                        @endforeach
                                        @if(count($countryFilters) > 5)
                                            <p class="loadMore pointer-events-auto underline py-3">
                                                {{ t('Page items.see more') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($brandFilters))
                    <div class="filters-container">
                        <div class="border-gray border rounded mb-3 mt-3 p-3">
                            <p class="pl-2 font-bold mb-3">{{ t('Page items.filter brand') }}</p>
                            <div class="bg-gray-200">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="flex flex-col pl-2 w-full">
                                        @foreach($brandFilters as $brandFilter)
                                            <label class="inline-flex items-center pointer mt-3 size-bar">
                                                <input type="checkbox" class="form-checkbox text-blue h-4 w-4 brand-select-input" value="{{ $brandFilter->id }}">
                                                @if($brandFilter->logo)
                                                    <span class="ml-2">
                                                        <img src="{{ $brandFilter->getLogoUrl() }}" class="img-responsive" alt="{{ $brandFilter->title }}" width="21" height="16">
                                                    </span>
                                                @endif
                                                <span class="ml-2 text-gray-700">
                                                    {{ $brandFilter->title }}
                                                </span>
                                            </label>
                                        @endforeach
                                        @if(count($brandFilters) > 5)
                                            <p class="loadMore pointer-events-auto underline py-3">
                                                {{ t('Page items.see more') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="border-gray border rounded p-3">
                    <p class="pl-2 font-bold">{{ t('Page items.filter price') }}</p>
                    <div class="product-types active">
                        <div class="range-slider-section">
                            <div class="range-slider">
                                <input type="text" class="js-range-slider" value=""/>
                            </div>
                            <div class="extra-controls flex w-full justify-around ">
                                <label for="from">
                                    <input type="text" name="from-price"
                                           class="form-input text-blue-dark font-bold w-5/6 js-input-from" id="from">
                                </label>
                                <p class="font-bold w-10 text-gray-dark text-xl">-</p>
                                <label for="to">
                                    <input type="text" name="to-price"
                                           class="form-input w-5/6  text-blue-dark font-bold js-input-to" id="to">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($filters))
                    <div class="filters-container">
                        @foreach($filters as $filter)
                            @if(count($filter->criteria) > 0)
                                <div class="border-gray border rounded mb-3 mt-3 p-3">
                                    <p class="pl-2 font-bold mb-3">{{ $filter->name }}</p>
                                    <div class="bg-gray-200">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="flex flex-col pl-2 w-full">
                                                @foreach($filter->criteria as $criterion)
                                                    <label class="inline-flex items-center pointer mt-3 size-bar">
                                                        <input type="checkbox"
                                                               class="form-checkbox text-blue h-4 w-4 filter-criteria" value="{{ $criterion->id }}">
                                                        <span class="ml-2 text-gray-700">{{ $criterion->name }}</span>
                                                    </label>
                                                @endforeach
                                                @if(count($filter->criteria) > 5)
                                                    <p class="loadMore pointer-events-auto underline py-3">
                                                        {{ t('Page items.see more') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
                @if(count($colorFilters))
                    <div class="border-gray border rounded mb-3 p-3">
                        <label for="colorFilters" class="pl-2 font-bold mb-3">{{ t('Page items.filter color') }}</label>
                        <div class="product-types active">
                            <div class="color-select"></div>
                            <select id="colorFilters" class="color-select-input hidden" data-colorselect multiple>
                                @foreach($colorFilters as $colorFilter)
                                    <option value="{{ $colorFilter->id }}" data-color="#{{ $colorFilter->hex_color }}">
                                        {{ $colorFilter->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="w-full lg:w-5/6  relative mb-10">
            <div class="flex flex-col flex-col-reverse">
                <div class="flex-1 flex flex-wrap" id="products-wrapper"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/product.js') }}"></script>
    <script src="{{ asset('js/viewModel-bundle.js') }}"></script>
@endsection
