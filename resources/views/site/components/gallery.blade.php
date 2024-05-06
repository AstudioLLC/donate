@if($items)
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/frontend/fancyapps.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('js/frontend/fancyapps.js') }}"></script>
    @endpush

    <div class="container-small news-detail-gallery">
        <div class="row mx-0">
            @foreach($items as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-1 p-md-2">
                    @if($item->image)
                        <a data-fancybox="gallery" href="{{ $item->getImageUrl('thumbnail', $item->image) }}">
                            <img class="img-fluid"
                                 src="{{ $item->getImageUrl('small', $item->image) }}"
                                 alt="{{ $item->title }}"
                                 title="{{ $item->title }}">
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
