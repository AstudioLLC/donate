@if($items)
    <div class="col-12 col-lg-9">
        <div class="row">
            @foreach($items as $item)
                @if(count($item->childrenForFooter))
                    <div class="col-12 col-sm-6 col-lg-4 mb-3">
                        <div class="footer-menu-wrap">
                            <span class="footer-menu-name">{{ $item->title }}</span>
                            @if(count($item->childrenForFooter))
                                <div class="footer-menu d-flex flex-column">
                                    @foreach($item->childrenForFooter as $children)
                                        <a href="{{ route('page', ['url' => $children->url]) }}" class="text-decoration-none footer_link">
                                            {{ $children->title }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
