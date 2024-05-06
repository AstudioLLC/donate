@if($item)
    <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
        <div class="stories-card">
            <div class="stories-picture">
                @if($item->imageSmall)
                    <img class="w-100"
                         src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}"
                         alt="{{ $item->title }}"
                         title="{{ $item->title }}">
                @endif
            </div>
            <div class="stories-information d-flex flex-column" style="width: 100%">
                <span class="stories-name">
                    {{ $item->title ?? null }}
                </span>
                <span class="stories-description">
                    {!! $item->short ?? null !!}
                </span>

                <span class="read-more">
                    <a href="{{ route('success_stories.detail', ['url' => $item->url ?? null]) }}" style="font-weight: bold;color: #F86A04; text-decoration: none">
                        {{__('frontend.See more')}}
                    </a>
                </span>
            </div>
        </div>
    </div>
@endif
