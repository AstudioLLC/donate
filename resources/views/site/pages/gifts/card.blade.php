@if($item)
    <div class="{{ isset($slider) ? 'swiper-slide' : 'col-12 col-sm-6 col-lg-4 p-3' }}">
        <a href="{{ route('gifts.detail', ['url' => $item->url ?? null]) }}" class="text-decoration-none gift-card d-flex flex-column h-100">
            @if($item->imageSmall)
                <div class="gift-card-image">
                    <img class="w-100"
                         src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}"
                         alt="{{ $item->title }}"
                         title="{{ $item->title }}">
                </div>
            @endif
            <div class="gift-card-details d-flex flex-column">
                <span class="gift-card-name">{{ $item->title ?? null }}</span>
                <div class="gift-card-description">
{{--                    {!! $item->content ?? null !!}--}}
                    {{Str::limit(strip_tags( $item->short ?? null,310)) }}

                </div>
                @if($item->cost)
                    <span class="gift-price">{{ __('frontend.Gifts.Price:') }} {{ $item->cost }}  {{ __('frontend.Gifts.AMD') }}</span>
                @endif
            </div>
        </a>
    </div>
@endif
