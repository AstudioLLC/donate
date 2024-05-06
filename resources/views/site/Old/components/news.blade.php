@if($item)
    <div class="w-full overflow-hidden shadow-over bg-white">
        @if($item->image)
            <img class="w-full" src="{{ $item->getImageUrl('small') }}" alt="{{ $item->image_alt }}" title="{{ $item->image_title }}">
        @else
            <img class="w-full" src="{{ asset('images/news-bg.jpg') }}" alt="{{ $item->image_alt }}" title="{{ $item->image_title }}">
        @endif
        <div class="bg-white">
            <div class="flex items-start  justify-center">
                <div class="-mt-8 xs:w-1/5 w-full">
                    <div class="relative">
                        <img src="{{ asset('images/news-bg.png') }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                        <p class="absolute translate-y-50 flex justify-center w-full font-medium items-center top-50 text-black-lighter text-xs lg:text-md">
                            {{ $item->created_at->format('d.m.Y') }}
                        </p>
                    </div>
                </div>
                <div class="w-9/12 sm:text-sm text-xs mb-2 p-2 leading-3 sm:leading-normal">
                    <a href="{{ route('news.detail', ['url' => $item->url]) }}" class="hover:text-pink-custom font-medium text-black">
                        {{ $item->title }}
                    </a>
                </div>
            </div>
            <p class="text-gray-700 px-4 pt-1 pb-5 sm:text-sm text-xs">
                {!! $item->short !!}
            </p>
        </div>
    </div>
@endif
