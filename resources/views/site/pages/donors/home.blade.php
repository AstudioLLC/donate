@if($items)
    <div class="partners-swiper-wrapper d-flex align-items-center">
        <button class="swiper-button-prev partners-swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                <g transform="translate(0 11) rotate(-90)">
                    <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"/>
                </g>
            </svg>
        </button>
        <div class="swiper-container partners-swiper-container">
            <div class="swiper-wrapper">
                @foreach($items as $item)
                    <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                        <img class="img-fluid"
                             src="{{ $item->getImageUrl('thumbnail') }}"
                             alt="{{ $item->title }}"
                             title="{{ $item->title }}">

                        <div class="partners-swiper-hover-description">
                            <span class="partners-hover-description-text-bold">{{ $item->title ?? null }}</span>
                            <span class="partners-hover-description-text">
                                {!! $item->content ?? null !!}
                                {{--Համագործակցում ենք սկսած՝<span class="partners-hover-description-text-bold"> 2020</span></span>
                                <span>Արշավների թիվը<span class="partners-hover-description-text-bold"> 2020</span>--}}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="swiper-button-next partners-swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                <g transform="translate(-97.141 11.001) rotate(-90)">
                    <path d="M5.5,103.141a.786.786,0,0,1-.545-.216L.226,98.4a.715.715,0,0,1,0-1.042.8.8,0,0,1,1.089,0l4.185,4,4.185-4a.8.8,0,0,1,1.089,0,.715.715,0,0,1,0,1.042l-4.73,4.526A.786.786,0,0,1,5.5,103.141Z" transform="translate(0 0)" fill="#0a0a0a"/>
                </g>
            </svg>
        </button>
    </div>
@endif
