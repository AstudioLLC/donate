<div class="w-full flex flex-col md:flex-row overflow-hidden shadow-lg">
    <div class="w-full md:w-4/12 my-5 md:m-5 shadow-over justify-around flex flex-col">
        <h1 class="text-blue py-5 font-bold text-center bg-white text-2xl">
            {{ $item->title }}
        </h1>
        @if($item->imageSmall)
            <img src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}" class="w-full" alt="{{ $item->title }}">
        @endif

        @if($item->name)
            <div class="relative w-2/6">
                <i class="fa fa-caret-left absolute text-xl text-pink-custom top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
                <a href="{{ asset('u/file/' . $item->name) ?? 'javascript:void(0)' }}" download class="w-full h-10 px-3 md:text-sm text-xss bg-pink-custom rounded rounded-l-none flex text-white items-center justify-center">
                    {{ t('Page form.download') }} <i class="fa fa-download"></i>
                </a>
            </div>
        @endif
    </div>
    <div class="w-full md:w-8/12">
        <div class="shadow-over p-6 md:ml-10 mt-5 md:m-5">
            @if($item->imageBig)
                <img src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}" class="w-full" alt="{{ $item->title }}">
            @endif
        </div>
    </div>
</div>
