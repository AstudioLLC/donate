@extends('site.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
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
                        <h1 class="p-2">Զամբյուղը</h1>
                    </div>
                </div>
            @endif

            @if(count($basketService->getItems()))
                <div class="w-full flex flex-wrap">
                    <div class="flex w-full lg:w-9/12 lg:px-5 flex-row md:flex-col">
                        <table id="info-table" class="table sm:divide-y sm:divide-gray sm:divide-y table-auto">
                            <thead>
                            <tr class="text-gray-dark sm:border-b border-gray-dark text-left">
                                <th class="font-normal px-1 py-2">Ապրանքի անվանում</th>
                                <th class="font-normal px-1">Գին</th>
                                <th class="font-normal px-1">Քանակ</th>
                                <th class="font-normal px-1">Չափման միավոր</th>
                                <th colspan="2" class="font-normal px-1">Ընդհանուր գումար</th>
                            </tr>
                            </thead>
                            <tbody class="sm:divide-y sm:divide-gray sm:divide-y">
                            <? /** @var App\ValueObjects\BasketItem $basketItem */ ?>
                            @foreach($basketService->getItems() as $basketItem)
                                <tr class="basket-item-row text-left" data-item-id="{{ $basketItem->getItemId() }}">
                                    <td class="font-semibold px-1 py-2">
                                        <a target="_blank" href="{{ route('product.detail', ['alias' => $basketItem->getItem()->alias]) }}">
                                            {{ $basketItem->getItemTitle() }}
                                        </a>
                                    </td>
                                    <td class="font-bold px-5 sm:px-1 py-2">
                                        <span class="basket-price" data-price="{{ $basketItem->getDiscountedPrice() }}">
                                            {{ formatPrice($basketItem->getDiscountedPrice()) }}
                                        </span> Դ
                                    </td>
                                    <td class="px-1 py-2">
                                        <div class="amount input-group-prepend w-11/12 border border-gray flex justify-center">
                                            <button
                                                class="down item-count-decrement w-10 md:text-sm text-xss py-0 outline-none focus:outline-none sm:h-10 h-5 md:px-3 px-1 flex text-black items-center justify-center">
                                                <svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" focusable="false"
                                                     data-prefix="fa" data-icon="minus" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                          d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                </svg><!-- <i class="fa fa-minus"></i> Font Awesome fontawesome.com -->
                                            </button>
                                            <input
                                                class="amountInp quantity basket-item-count w-1/3 text-center sm:text-md text-xs outline-none focus:outline-none"
                                                min="0"
                                                name="quantity"
                                                data-item-id="{{ $basketItem->getItem()->id }}"
                                                data-max-count="{{ $basketItem->getItem()->count }}"
                                                value="{{ $basketItem->getCount() }}"
                                                type="number">
                                            <button type="button"
                                                    class="up item-count-increment w-10 md:text-sm text-xss py-0  outline-none focus:outline-none sm:h-10 h-5 md:px-3 px-1  flex text-black items-center justify-center view-count-increment">
                                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false"
                                                     data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                          d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                </svg><!-- <i class="fa fa-plus"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </td>
                                    <td class="w-full sm:w-1/6 px-1 py-2">
                                        {{ $basketItem->getItem()->unit_of_measurement }}
                                    </td>
                                    <td class="font-bold px-1 py-2">
                                        <span class="item-total-price">{{ formatPrice($basketItem->getCount() * $basketItem->getDiscountedPrice()) }}</span> Դ
                                    </td>
                                    <td class="px-1 py-2">
                                        <button class="remove-item bg-black w-8 h-8 flex justify-center rounded items-center p-2">
                                            <img src="{{ asset('images/delete.svg') }}">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex w-full lg:w-3/12 mt-16 lg:mt-0 flex-col">
                        <div class="bg-gray-light p-2">
                            <p class="font-bold text-lg">Պատվերի ամփոփում</p>
                            <p class="text-sm">??? Պատվերի Nº 146227</p>
                        </div>
                        <div class="bg-yellow-custom p-1">
                            <div class="p-2 flex justify-between border-dashed border-t-3 font-bold text-white">
                                <p>Ընդհանուր</p>
                                <p>
                                    <span class="basket-total-amount"></span> Դ
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('cabinet.order.create') }}" class="w-full p-2 mt-3 rounded block bg-blue text-center text-white">
                            Պատվիրել
                        </a>
                    </div>

                </div>
            @else
                <h2 class="text-center w-full my-5">{{ t('Page items.no results') }}</h2>
            @endif

        </div>
    </div>
@endsection
