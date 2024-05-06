<section>
    <div class="container mx-auto mt-0 lg:mt-8">
        <div class="flex flex-col hidden sm:block lg:hidden">
            @if($collection)
                <p class="font-bold text-xl xl:text-2xl text-black-lighter">
                    {{ $collection->title }}
                </p>
            @endif
            <p class="mb-4">
                {{ t('Page items.item code') }}
                <span class="font-bold">{{ $item->code }}</span>
            </p>
            <div class="w-fit bg-pink-custom">
                {{ $item->title }}
            </div>
        </div>
        <div class="flex w-full lg:flex-no-wrap flex-wrap justify-around bg-grayLighter">
            <div class="w-full sm:w-7/12 pr-2 pb-5">
                <div class="flex">
                    <div class="w-full lg:w-4/5 swiper-container gallery-top m-0">
                        <div class="swiper-wrapper">
                            @if(isset($collection->image))
                                <div class="swiper-slide bg-white border border-gray-custom">
                                    <img src="{{ $collection->getImageUrl('thumbnail') }}"
                                         class="w-full object-cover object-center transform cursor-pointer transition duration-500 hover:scale-150"
                                         alt="{{ $collection->title }}"
                                         title="">
                                </div>
                            @endif

                            @if($item->image)
                                <div class="swiper-slide bg-white border border-gray-custom">
                                    <img src="{{ $item->getImageUrl('thumbnail') }}"
                                         class="w-full object-cover object-center transform transition duration-500 hover:scale-150"
                                         alt="{{ $item->title }}"
                                         title="">
                                </div>
                            @else
                                <div class="swiper-slide bg-white border border-gray-custom">
                                    <img src="{{ asset('images/no-image.jpg') }}"
                                         class="w-full object-cover object-center transform transition duration-500 hover:scale-150"
                                         alt="{{ $item->title }}"
                                         title="">
                                </div>
                            @endif

                            @if(isset($collection_gallery))
                                @foreach($collection_gallery as $gallery)
                                    <div class="swiper-slide bg-white border border-gray-custom">
                                        <img class="w-full"
                                             src="{{ $gallery->getImageUrl('thumbnail') }}"
                                             alt="{{ $gallery->alt }}"
                                             title="">
                                    </div>
                                @endforeach
                            @endif

                            @if(isset($collection->items))
                                @foreach($collection->items as $collection_item)
                                    @if($collection_item->id != $item->id)
                                        @if($collection_item->image)
                                            <div class="swiper-slide bg-white border border-gray-custom">
                                                <img src="{{ $collection_item->getImageUrl('thumbnail') }}"
                                                     data-id="{{ $collection_item->id }}"
                                                     class="w-full object-cover object-center transform transition duration-500 hover:scale-150 collectionItemChange"
                                                     alt="{{ $collection_item->image->alt }}"
                                                     title="">
                                            </div>
                                        @else
                                            <div class="swiper-slide bg-white border border-gray-custom">
                                                <img src="{{asset('images/P1.png')}}"
                                                     data-id="{{ $collection_item->id }}"
                                                     class="w-full object-cover object-center transform transition duration-500 hover:scale-150 collectionItemChange"
                                                     alt="{{ $collection_item->title }}"
                                                     title="">
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            @if(count($item_gallery))
                                @foreach($item_gallery as $gallery)
                                    <div class="swiper-slide bg-white border border-gray-custom">
                                        <img class="w-full"
                                             src="{{ $gallery->getImageUrl('thumbnail') }}"
                                             alt="{{ $gallery->alt }}"
                                             title="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next  block">
                            <div class="bg-white lg:hidden block px-3 py-2 text-gray-dark">
                                <i class="fa fa-arrow-right" aria-expanded="true"></i>
                            </div>
                        </div>
                        <div class="swiper-button-prev  block">
                            <div class="bg-white lg:hidden block px-3 py-2 text-gray-dark">
                                <i class="fa fa-arrow-left" aria-expanded="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container w-2/12 lg:block hidden m-0 gallery-thumbs">
                        <div class="swiper-button-next next_gallery"><i class="fa fa-angle-up"></i> </div>
                        <div class="swiper-wrapper">
                            @if(isset($collection->image))
                                <div class="swiper-slide mb-2">
                                    <img src="{{ $collection->getImageUrl('small') }}"
                                         class="w-full h-full object-cover border border-gray-custom object-center"
                                         alt="{{ $collection->title }}"
                                         title="">
                                </div>
                            @endif

                            @if($item->image)
                                <div class="swiper-slide mb-2">
                                    <img src="{{ $item->getImageUrl('small') }}"
                                         class="w-full h-full  object-cover border border-gray-custom object-center"
                                         alt="{{ $item->image->alt }}"
                                         title="">
                                </div>
                            @else
                                <div class="swiper-slide mb-2">
                                    <img src="{{ asset('images/no-image.jpg') }}"
                                         class="w-full h-full object-cover object-center border border-gray-custom"
                                         alt="{{ $item->title }}"
                                         title="">
                                </div>
                            @endif

                            @if(isset($collection_gallery))
                                @foreach($collection_gallery as $gallery)
                                    <div class="swiper-slide mb-2">
                                        <img class="w-full h-full object-cover border border-gray-custom object-center"
                                             src="{{ $gallery->getImageUrl('small') }}"
                                             alt="{{ $gallery->alt }}"
                                             title="">
                                    </div>
                                @endforeach
                            @endif

                            @if(isset($collection->items))
                                @foreach($collection->items as $collection_item)
                                    @if($collection_item->id != $item->id)
                                        @if($collection_item->image)
                                            <div class="swiper-slide mb-2">
                                                <img src="{{ $collection_item->getImageUrl('small') }}"
                                                     data-id="{{ $collection_item->id }}"
                                                     class="w-full h-full object-cover object-center border border-gray-custom collectionItemChange"
                                                     alt="{{ $collection_item->image->alt }}"
                                                     title="">
                                            </div>
                                        @else
                                            <div class="swiper-slide mb-2">
                                                <img src="{{asset('images/P1.png')}}"
                                                     class="w-full h-full object-cover object-center collectionItemChange"
                                                     alt="{{ $collection_item->title }}"
                                                     title="">
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            @if(count($item_gallery))
                                @foreach($item_gallery as $gallery)
                                    <div class="swiper-slide mb-2">
                                        <img class="w-full h-full object-cover border border-gray-custom object-center"
                                             data-id="{{ isset($collection_item->id) ? $collection_item->id : null }}"
                                             src="{{ $gallery->getImageUrl('small') }}"
                                             alt="{{ $gallery->alt }}"
                                             title="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-prev prev_gallery"><i class="fa fa-angle-down"></i></div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-5/12 px-2 pb-5 flex flex-col flex-wrap">
                <h1 class="font-bold text-xl xl:text-2xl block sm:hidden lg:block text-black-lighter mb-2">
                    {{ $item->title }}
                </h1>
                <p class="mb-4">
                    {{ t('Page items.item code') }}
                    <span class="font-bold">{{ $item->code }}</span>
                </p>
                @if($collection)
                    <p class="w-fit pr-12 bg-pink-custom text-white rounded p-2 mb-4">
                        {{ $collection->title }}
                    </p>
                @endif

                @if($countryFilters)
                    @foreach($countryFilters as $countryFilter)
                        <label class="inline-flex items-center pointer mt-3 size-bar">
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
                @endif

                @if(count($item->brands))
                    @foreach($item->brands as $brand)
                        @if($brand->title)
                            <label class="inline-flex items-center pointer mt-3 size-bar bg-gray-light">
                                @if($brand->logo)
                                    <span class="ml-2">
                                        <img src="{{ $brand->getLogoUrl() }}" class="img-responsive" alt="{{ $brand->title }}" width="21" height="16">
                                    </span>
                                @endif
                                <span class="ml-2 text-gray-700">
                                    <a href="{{ $brand->url ? route('brands.detail', ['url' => $brand->url]) : 'javascript:void(0)' }}" title="{{ $brand->title ?? null }}">
                                        {{ $brand->title }}
                                    </a>
                                </span>
                            </label>
                        @endif
                    @endforeach
                @endif

                <div class="flex flex-wrap items-center mb-2">
                    <div class="flex">
                        <p class="mb-1 ml-1 order-2 lg:order-1 text-sm font-bold text-gray-darker{{ $item->unit_of_measurement == null ? ' opacity-0' : '' }}">
                            {{ $item->unit_of_measurement }} {{ t('Page items.unit of measurement price') }}
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center w-full">
                        <div class="price w-1/2 lg:w-1/3 order-1 pr-5 flex flex-col">
                            <p class="xl:text-4xl order-1 lg:order-2 md:text-2xl sm:text-xl text-black-light">
                                @if($item->price)
                                    {{ formatPrice($item->price) }}
                                    <span class="sm:text-base md:text-xl xl:text-2xl">Դ</span>
                                @endif
                            </p>
                        </div>
                        <div
                            class="flex flex-col order-5 sm:order-4 lg:order-2 my-4 lg:my-0 w-1/3 sm:w-full lg:w-1/6 pl-2 border-l-2 border-gray">

                            @if($item->bulk_price && $item->bulk_price != $item->price)
                                <p class="text-gray-darker sm:text-base text-xs font-bold">
                                    {{ t('Page items.old price') }}
                                </p>
                                <p class="text-gray-dark font-bold text-base line-through sm:text-lg">
                                    {{ formatPrice($item->bulk_price) }}Դ
                                </p>
                            @else
                                @if($item->discount)
                                    <p class="text-gray-darker sm:text-base text-xs font-bold">
                                        {{ t('Page items.old price') }}
                                    </p>
                                    <p class="text-gray-dark font-bold text-base line-through sm:text-lg">
                                        @if($item->bulk_price && $item->bulk_price != $item->price)
                                            {{ formatPrice($item->bulk_price) }}Դ
                                        @else
                                            {{ formatPrice($item->realPrice) }}Դ
                                        @endif
                                    </p>
                                @endif
                            @endif

                        </div>
                        <div class="w-auto ml-6 order-3 transform rotate-45">
                            @if($item->discount)
                                <div class="flex justify-center items-center m-1 bg-red xs:w-10 xs:h-10 w-5 h-5">
                                    <p class="transform -rotate-45 xs:text-lg text-xss text-white font-bold ">
                                        -{{ $item->discount }}%
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex w-full count-section">
                        @if($item->price != 0 || $item->count != 0 || $item->price)
                            <div class="w-1/2 lg:w-1/4 my-3 order-4 mr-1 sm:mr-20 lg:mr-1">
                                <div class="w-full border border-gray flex">
                                    <button
                                        class="view-count-decrement w-10 md:text-sm text-xss py-0 outline-none bg-white focus:outline-none h-10 md:px-3 px-1 flex text-black items-center justify-center">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input
                                        class="product-view-count quantity w-1/2 text-center sm:text-base text-xs outline-none border border-b-0 my-1 border-gray-custom border-t-0 focus:outline-none"
                                        min="0"
                                        name="quantity"
                                        value="1"
                                        data-item-id="{{ $item->id }}"
                                        data-max-count="{{ $item->count }}"
                                        type="number">
                                    <button type="button"
                                            class="view-count-increment w-10 md:text-sm text-xss py-0 bg-white outline-none focus:outline-none h-10 h-5 md:px-3 px-1 flex text-black items-center justify-center">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="w-auto order-5 my-3 mx-1 border border-gray flex">
                                <button type="button"
                                        title="@if($item->price == 0 || $item->count == 0 || !$item->price){{ t('Page items.not in stock') }}@endif"
                                        data-item-id="{{ $item->id }}"
                                        class="@if($item->price == 0 || $item->count == 0 || !$item->price) disabled-action-trigger @endif basket-action-trigger w-auto h-10 py-0 px-2 bg-black-lighter rounded flex items-center justify-center">
                                    <img src="{{ asset('images/shopping-cart.svg') }}" alt="">
                                    <span class="px-2 text-white">{{ t('Page items.make order') }}</span>
                                </button>
                            </div>
                        @endif
                        <div class="w-auto order-6 my-3 mx-0 sm:mx-1 border border-gray flex">
                            <button type="button"
                                    data-item-id="{{ $item->id }}"
                                    class="favorite-action-trigger w-auto sm:w-10 h-10 w-6 h-6 py-0 px-2 bg-pink-custom rounded flex items-center justify-center">
                                <img src="{{ asset('images/love.svg') }}" alt="">
                                <span class="px-2 sm:hidden block text-white">{{ t('Page items.make favourite') }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                @if(isset($collection->items))
                    <div class="flex bg-white flex-1 w-full lg:w-11/12 shadow shadow-sm collection-section">
                        <div class="mt-2 w-full ">
                            @php($bg = 1)
                            @foreach($collection->items as $collection_item)
                                <div class="border-b border-gray-custom p-4 {{ $bg % 2 == 0? 'bg-gray':''}}">
                                    <label class="inline-flex items-center w-full">
                                        <input type="radio"
                                               name="collection_item"
                                               data-id="{{ $collection_item->id }}"
                                               value="{{ $collection_item->id }}"
                                               class="collectionItemChange form-checkbox w-5 h-5 outline-none text-pink-custom focus:border-none focus:outline-none focus:shadow-none"
                                            {{ $collection_item->id == $item->id ? 'checked' : '' }}>
                                        <div class="ml-2 cursor-pointer flex checkbox-section w-full">
                                            <p class="w-9/12 ">
                                                {{ $collection_item->title }}
                                            </p>
                                            <p class="w-3/12 font-bold pl-3">
                                                {{ $collection_item->price > 0 ? formatPrice($collection_item->price).'Դ' : '' }}
                                            </p>
                                        </div>
                                    </label>
                                </div>
                                @php($bg++)
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto mt-12 shadow-custom">
        <ul id="tab-section" class="flex md:flex-no-wrap flex-wrap justify-around bg-grayLighter">
            <li class="bg-white md:text-center text-left w-full">
                <a class="tab_product w-full inline-block py-3 px-10 text-headerBg" data-id="about"
                   href="javascript:void(0)">
                    {{ t('Page items.item about') }}
                </a>
            </li>
            <li class="bg-gray mr-0 md:mr-1 md:text-center text-left w-full">
                <a class="tab_product w-full inline-block py-3 px-10 text-headerBg" data-id="description"
                   href="javascript:void(0)">
                    {{ t('Page items.item description') }}
                </a>
            </li>
        </ul>
        <div id="about" class="tab_info flex flex-col justify-between px-4 md:px-6 lg:px-12 py-10">
            {!! $item->description !!}
        </div>
        <div id="description" class="tab_info flex-col md:flex-row justify-between px-4 md:px-6 lg:px-12 py-10 hidden">
            @if($item->short_description)
                {!! $item->short_description !!}
            @endif
            @if($item->options)
                @foreach($item->options as $option)
                    @if($option->name && $option->value)
                        <div class="flex w-11/12 sm:w-1/2 py-1">
                            <span class="item">{{ $option->name }}</span>
                            <span class="dots px-2"></span>
                            <span class="desc font-bold">{{ $option->value }}</span>
                        </div>
                    @endif
                @endforeach
            @endif

            @if($filters)
                @foreach($filters as $filter)
                    @if($filter->criteria)
                        <div class="flex w-11/12 sm:w-1/2 py-1">
                            <span class="item">{{ $filter->name }}</span>
                            <span class="dots px-2"></span>
                            <span class="desc font-bold">
                                @foreach($filter->criteria as $criterion)
                                    {{ $criterion->name }}
                                @endforeach
                            </span>
                        </div>
                    @endif
                @endforeach
            @endif

            @if($colorFilters)
                <div class="flex w-11/12 sm:w-1/2 py-1">
                    <span class="item">{{ t('Page items.filter color') }}</span>
                    <span class="dots px-2"></span>
                    <span class="desc font-bold">
                        @foreach($colorFilters as $colorFilter)
                            @if($colorFilter->name)
                                {{ $colorFilter->name }}
                            @endif
                        @endforeach
                    </span>
                </div>
            @endif

        </div>
    </div>
</section>
