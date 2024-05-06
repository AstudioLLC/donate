@if($item)
    <div class="{{ isset($swiper) ? 'slide-event-card' : 'col-12 col-sm-6 col-lg-4 d-flex flex-column event-card' }}">
        <a href="{{ route('news.detail', ['url' => $item->url ?? null]) }}" class="text-decoration-none" style="color: #0A0A0A">
            <div class="event-image-wrap">
                @if($item->imageSmall)
                    <img class="{{ isset($swiper) ? 'img-fluid filter-image' : 'w-100' }}"
                         src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}"
                         alt="{{ $item->title }}"
                         title="{{ $item->title }}">
                @endif
            </div>
            <div class="event-details-wrap">
                <div class="event-details d-flex flex-column">
                    <span class="event-name">
                        {{ $item->title ?? null }}
                    </span>
                    <div class="event-description">
                        {!! $item->short ?? null !!}
                    </div>
                    <div class="d-flex justify-content-between align-items-center event-details-bottom">
                        <span class="event-date">
                            {{ $item->created_at->format('d/m/Y') }}
                        </span>
                        <div class="share-img-wrap">
                            <img src="{{ asset('images/share-img.jpg') }}"
                                 alt="{{ $item->title }}"
                                 title="{{ $item->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
