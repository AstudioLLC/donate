@if(!empty($item))
    <div
        class="item-card w-full shadow-over bg-white m-auto border-1 border-dashed border-gray-100 items-center rounded-sm shadow-sm overflow-hidden flex-col flex h-full relative">
        <div class="p-2 relative flex w-full items-center justify-center overflow-hidden flex-1 h-auto">
            <a href="{{ route('product.detail', ['alias' => $item->alias]) }}" class="overflow-hidden">
                @if(isset($item->collection) && $item->collection->image)
                    <img src="{{ $item->collection->getImageUrl('small') }}" class="w-full object-cover object-center transform transition duration-500 hover:scale-110 "
                         alt="{{ $item->collection->title }}" title="{{ $item->collection->title }}">
                @else
                    @if($item->image)
                        <img src="{{ $item->getImageUrl('small') }}" class="w-full object-cover object-center transform transition duration-500 hover:scale-110 "
                             alt="{{ $item->title }}" title="{{ $item->title }}">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" class="w-full object-cover object-center transform transition duration-500 hover:scale-110 "
                             alt="{{ $item->title }}" title="{{ $item->title }}">
                    @endif
                @endif
            </a>
            <div class="absolute right-5 top-5 flex flex-col">
                @if($item->is_new)
                    <div class="box-section border border-white transform sm:mb-8 mb-4 rotate-45">
                        <div class="flex justify-center items-center m-1 bg-yellow-dark sm:w-10 sm:h-10 w-5 h-5">
                            <p class="transform -rotate-45 sm:text-md text-xss text-white font-bold">NEW</p>
                        </div>
                    </div>
                @endif
                @if($item->is_promotion)
                    <div class="box-section border border-white transform sm:mb-8 mb-4 rotate-45">
                        <div class="flex justify-center items-center m-1 bg-yellow-dark sm:w-10 sm:h-10 w-5 h-5">
                            <p class="transform -rotate-45 sm:text-md text-xss text-white font-bold">NEW</p>
                        </div>
                    </div>
                @endif
                @if($item->discount)
                    <div class="box-section border border-white transform rotate-45">
                        <div class="flex justify-center items-center m-1 bg-red sm:w-10 sm:h-10 w-5 h-5">
                            <p class="transform -rotate-45 sm:text-md text-xss text-white font-bold">
                                -{{ $item->discount }}%</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="bottom-section p-3 flex flex-col w-full">
            <a href="{{ route('product.detail', ['alias' => $item->alias]) }}" class="item-short-title font-bold text-xs md:text-lg mb-1 text-black-light sm:mb-5 mb-3">
                {{ $item->title }}
            </a>
            <hr class="text-gray">
            <div class="h-auto">
                <p class="size-text text-xss sm:text-xs{{ $item->unit_of_measurement == null ? ' opacity-0' : '' }}">
                    {{ $item->unit_of_measurement }} - արժեքը
                </p>
                <div class="info-section flex sm:flex-row flex-col p-2 justify-between {{ $item->price != 0 && $item->count != 0 ? '' : 'disable' }}">
                    <div class="sm:w-1/2 w-full price-section flex gap-3 sm:flex-col flex-row sm:justify-end justify-center sm:items-start items-center">
                        <div>
                            @if($item->bulk_price && $item->bulk_price != $item->price)
                                <p class="del-price sm:text-sm md:text-lg text-xss w-fit text-gray-dark py-1 relative text-decoration-style">
                                    {{ formatPrice($item->bulk_price) }}֏
                                </p>
                            @else
                                @if($item->discount)
                                    <p class="del-price sm:text-sm md:text-lg text-xss w-fit text-gray-dark py-1 relative text-decoration-style">
                                        {{ formatPrice($item->realPrice) }}֏
                                    </p>
                                @endif
                            @endif
                            <p class="price sm:text-sm md:text-2xl text-xs text-black-lighter">
                                {{ $item->price != 0 ? formatPrice($item->price).'֏' : '' }}
                            </p>
                        </div>
                    </div>
                    <div class="count-section sm:w-1/2 w-full flex gap-3 flex-col justify-end items-end">
                        <div class="w-full border border-gray flex">
                            <button
                                class="view-count-decrement w-10 md:text-sm text-xss py-0 outline-none focus:outline-none sm:h-10 h-5 md:px-3 px-1 flex text-black items-center justify-center">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input class="product-view-count quantity w-1/2 text-center my-1 border border-gray border-t-0 border-b-0 sm:text-base text-xs outline-none focus:outline-none"
                                   min="0"
                                   name="quantity"
                                   data-item-id="{{ $item->id }}"
                                   data-max-count="{{ $item->count }}"
                                   value="1"
                                   type="number">
                            <button type="button"
                                    class="view-count-increment w-10 md:text-sm text-xss py-0 outline-none focus:outline-none sm:h-10 h-5 md:px-3 px-1 flex text-black items-center justify-center view-count-increment">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="flex gap-1">
                            <button type="button"
                                    title="@if($item->price == 0 || $item->count == 0 || !$item->price){{ t('Page items.not in stock') }}@endif"
                                    data-item-id="{{ $item->id }}"
                                    class="@if($item->price == 0 || $item->count == 0 || !$item->price) disabled-action-trigger @endif basket-action-trigger sm:w-8 sm:h-8 w-6 h-6 py-1 px-1 bg-black-lighter rounded flex items-center justify-center">
                                <img src="{{ asset('images/shopping-cart.svg') }}" alt="">
                            </button>
                            <button type="button"
                                    data-item-id="{{ $item->id }}"
                                    class="favorite-action-trigger sm:w-8 sm:h-8 w-6 h-6 p-1 bg-pink-custom rounded flex items-center justify-center">
                                <i class="fas fa-heart text-white"></i>
                                {{--<img src="{{ asset('images/love.svg') }}" alt="">--}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

@endif
