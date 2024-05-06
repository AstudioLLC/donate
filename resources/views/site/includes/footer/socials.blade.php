@if($items)
    <div class="footer-menu-wrap footer-menu-wrap-2">
    <span class="footer-menu-name">
        {{ __('frontend.footer.We are in social networks') }}
    </span>
        <div class="footer-menu d-flex flex-row">
            @foreach($items as $item)
                <a {{ $item->url ? 'target=_blank' : '' }} href="{{ $item->url ?? 'javascript:void(0)' }}" class="d-block social-box">
                    <img class="img-fluid" src="{{ $item->getImageUrl('thumbnail') }}" alt="{{ $item->title ?? null }}" title="">
                </a>
            @endforeach
        </div>
    </div>
@endif
