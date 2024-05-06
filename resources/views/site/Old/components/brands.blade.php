<div class="bg-white shadow-over border relative shadow border-gray">
    <div class="swiper-container md:w-11/12 w-10/12 partners">
        <div class="swiper-wrapper">
            @foreach($brands as $item)
                @if($item->getLogoUrl())
                    <div class="swiper-slide select-none flex my-2 h-auto">
                        <a href="{{ $item->url ? route('brands.detail', ['url' => $item->url]) : 'javascript:void(0)' }}" title="{{ $item->title ?? null }}">
                            <img src="{{ $item->getLogoUrl() }}" alt="{{ $item->title ?? null }}" title="{{ $item->title ?? null }}"
                                 class="w-full object-cover object-center">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="next1 flex justify-center items-center top-50 swiper-button-white absolute right-0">
        <div class="shadow-over bg-gray-lighter right-0 cursor-pointer absolute md:h-10 h-5 md:p-5 p-2 md:text-sm text-xs justify-center flex items-center">
            <i class="fa fa-arrow-right text-black"></i>
        </div>
    </div>
    <div class="prev1 flex justify-center items-center top-50 left-0 swiper-button-white absolute">
        <div class="shadow-over bg-gray-lighter cursor-pointer left-0 absolute md:h-10 h-5 md:p-5 md:text-sm text-xs p-2 justify-center flex items-center">
            <i class="fa fa-arrow-left text-black"></i>
        </div>
    </div>
</div>
