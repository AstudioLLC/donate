<div id="about-lightgallery" class="flex flex-wrap my-3">
    @foreach($gallery as $item)
        <div class="md:w-1/4 w-1/2 p-2">
            <div class="item cursor-pointer" data-src="{{ $item->getImageUrl('thumbnail') }}">
                <img src="{{ $item->getImageUrl('small') }}"
                     alt="{{ $item->alt }}"
                     title="{{ $item->title }}">
            </div>
        </div>
    @endforeach
</div>
