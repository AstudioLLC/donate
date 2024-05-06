@if($items)
    <div class="section-swiper">
        <div class="swiper-container main-swiper-container d-flex justify-content-center">
            <div class="@if(count($items) > 1)swiper-wrapper @endif">
                @foreach($items as $item)
                    <div class="swiper-slide main-swiper-slide-box">
                        <div class="slide-box position-relative d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ $item->getImageUrl('thumbnail') }}" alt="{{ $item->title ?? null }}" title="">
                            <img src="{{asset('storage/media/sliders/thumbnail/')}}/{{$item->mobile_image}}" class="d-none img-fluid img-center p-2">

                            <div class="slide-box-content container position-absolute">
                                <h1 class="slide-box-name">
                                    {{ $item->title }}
                                </h1>
                                <a href="{{ $item->url ?? 'javascripit:void(0)' }}" class="d-block button-orange text-decoration-none">
                                    {{ $item->button_title }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination main-swiper-pagination"></div>
            <div class="main-swiper-buttons header-container">
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 20 36">
                        <g transform="translate(0)">
                            <path d="M118.164,17.012,135.293.407a1.465,1.465,0,0,1,2.03,0,1.368,1.368,0,0,1,0,1.973L121.211,18l16.11,15.617a1.368,1.368,0,0,1,0,1.973,1.465,1.465,0,0,1-2.031,0l-17.129-16.6a1.367,1.367,0,0,1,0-1.976Z" transform="translate(-117.742 0)" fill="#fff"/>
                        </g>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 20 36">
                        <g transform="translate(0)">
                            <path d="M137.32,17.012,120.192.407a1.465,1.465,0,0,0-2.03,0,1.368,1.368,0,0,0,0,1.973L134.274,18l-16.11,15.617a1.368,1.368,0,0,0,0,1.973,1.465,1.465,0,0,0,2.031,0l17.129-16.6a1.367,1.367,0,0,0,0-1.976Z" transform="translate(-117.742 0)" fill="#fff"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endif
@push('js')
<script type="text/javascript">
    $(document).ready(function (){
        $(".donate_baner_block").click(function (event){
            event.stopPropagation();
        })
        $("body").addClass('overflow-h')
        $(".close_mod, .donate_baner_bg").click(function (){
            $(".donate_baner_bg,.donate_baner_block").hide()
            $("body").removeClass('overflow-h')
        })
    })
</script>
@endpush
