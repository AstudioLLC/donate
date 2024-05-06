<div class="auto ml-3 m md:w-1/5 w-4/8">
    <form action="{{ route('products.search') }}" method="get" class="w-auto flex items-center">
        <label for="">
            <input class="md:w-64 h-10 text-xs lg:text-md border rounded border-gray-light mr-2 p-3 focus:outline-none"
                   name="searchQuery"
                   type="text"
                   placeholder="{{ t('Page search.search placeholder') }}"
                   value="{{ request()->query('searchQuery') }}">
        </label>
        <div class="relative">
            <i class="fa fa-caret-left absolute text-xl text-black top-50 translate-y-50 left--7" aria-hidden="true"></i>
            <button type="submit" class="w-10 h-10 bg-black rounded flex items-center justify-center">
                <img src="{{ asset('images/search-icon.svg') }}" alt="">
            </button>
        </div>
    </form>
</div>
<div class="flex gap-1">
    <div class="ml-2 flex gap-1">
        <div class="relative">
            <i class="fa fa-caret-left absolute text-xl text-black-lighter top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
            <button type="button" class="basket-icon w-10 h-10 bg-black-lighter rounded flex items-center justify-center">
                <a href="{{ route('cabinet.basket.all') }}">
                    <img src="{{ asset('images/cart.svg') }}" alt="">
                </a>
            </button>
        </div>
        <div class="rounded w-10 h-10 flex items-center justify-center border border-gray">
            <span class="text-black-lighter basket-items-count">0</span>
        </div>
    </div>
    <div class="ml-2 flex gap-1">
        <div class="relative">
            <i class="fa fa-caret-left absolute text-xl text-pink-custom top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
            <button type="button" class="favorite-icon w-10 h-10 bg-pink-custom rounded flex items-center justify-center">
                <img src="{{ asset('images/favorite.svg') }}" alt="">
            </button>
        </div>
        <div class="rounded w-10 h-10 flex items-center justify-center border border-gray">
            <span class="text-pink-custom favorite-items-count">0</span>
        </div>
    </div>
</div>
