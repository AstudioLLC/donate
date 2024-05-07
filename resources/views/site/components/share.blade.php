
<div class="share-block d-flex flex-wrap align-items-center">
    <span class="share-text d-block">{{ __('frontend.Share') }}</span>

    <div class="share-icons-wrap d-flex flex-wrap align-items-center">
        <div class="share-facebook share-icon ms-2 my-1 ms-lg-3">
            <a target="_blank" href='https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}'><img class="img-fluid" src="{{ asset('storage/media/socials/thumbnail/mwcg-facebook.png') }}" alt="" title=""></a>
        </div>
        <div class="share-twitter share-icon ms-2 my-1 ms-lg-3">
            <img class="img-fluid" src="{{ asset('storage/media/socials/thumbnail/kr9t-twitter.png') }}" alt="" title="">
        </div>
    </div>
    @if(count($item->files))
        @foreach($item->files as $file)
            <a href="{{ $file->getImageUrl('thumbnail', $file->name) }}" class="button-orange text-decoration-none ms-2 my-1 ms-lg-3" download>
                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                <span class="btn-inner--text">{{ __('app.Download') }}</span>
            </a>
        @endforeach
    @endif
</div>



