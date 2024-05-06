@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/children-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/my_sponsorship.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/frontend/photos-videos.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/sponsor-card.js') }}"></script>
    <script src="{{ asset('js/frontend/demo-modals.js') }}"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
    <script src="{{ asset('js/frontend/photos-videos.js') }}"></script>
@endpush


@section('content')
    @if($payment)
        @include('site.includes.popups.paymentSuccessPopup')
    @endif
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>
            <div class="profile-content-right">
                <div class="profile-content-right-top">
                    <span class="title-usual profile-title">{{ __('frontend.cabinet.My Sponsorship') }}</span>
                    <a href="{{ route('cabinet.sponsorship.create.step1') }}" class="button-orange text-decoration-none" >
                        <img class="img-fluid"
                             src="{{ asset('images/add-size.svg') }}"
                             alt="{{ __('frontend.cabinet.New Sponsorship') }}"
                             title="{{ __('frontend.cabinet.New Sponsorship') }}">
                        <span>{{ __('frontend.cabinet.New Sponsorship') }}</span>
                    </a>
                </div>
                @if(count($childrens))
                    <div class="your-sponsor profile-right-block d-flex flex-column">
                        @foreach($childrens as $item)
                            @include('site.pages.cabinet.components.sponsor_card', ['item' => $item])
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>


    @include('site.components.donate_now')
@endsection

@if(count($childrens))
    @foreach($childrens as $key => $child)
        <!-- Modal gallery-->
        <div class="container d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="modal fade" id="galleryModal{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl gallery-block">
                    <div class="modal-content" style="background:transparent;max-height: 707px;height: 100%;overflow: hidden;border:none">
                        <div class="close-videos-gallerys-block" data-bs-dismiss="modal" aria-label="Close">
                            <img  src="{{ asset('images/cancel.svg') }}" alt="" title="">
                        </div>
                        <div class="modal-body img-slider">
                            <div class="swiper-container swiper-photos">
                                <div class="swiper-wrapper">
                                    @foreach($child->gallery as $gal)
                                        <div class="swiper-slide img-slider-item">
                                            <img src="{{ $gal->getImageUrl('thumbnail') }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev">
                                    <img class="img-fluid" src="{{ asset('images/left -arrow.svg') }}" alt="" title="">
                                </div>
                                <div class="swiper-button-next">
                                    <img class="img-fluid" src="{{ asset('images/right-arrow.svg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@if(count($childrens))
    @foreach($childrens as $key => $child)
        <!-- Modal videos-->
        <div class="container d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="modal fade" id="videoModal{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl gallery-block">
                    <div class="modal-content" style="background:transparent;max-height: 707px;height: 100%;overflow: hidden;border:none">
                        <div class="close-videos-gallerys-block video-close" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#myModal">
                            <img  src="{{ asset('images/cancel.svg') }}" alt="" title="">
                        </div>
                        <div class="modal-body img-slider">
                            <div class="swiper-container swiper-videos">
                                <div class="swiper-wrapper">
                                    @foreach($child->videos as $video)
                                        <div class="swiper-slide">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/embed/{{$video->link}}?enablejsapi=1" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev">
                                    <img class="img-fluid" src="{{ asset('images/left -arrow.svg') }}" alt="" title="">
                                </div>
                                <div class="swiper-button-next">
                                    <img class="img-fluid" src="{{ asset('images/right-arrow.svg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
