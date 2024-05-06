@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/children-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/photos-videos.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
@endpush

@push('js')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/frontend/slider-profile.js') }}"></script>
    <script src="{{ asset('js/frontend/photos-videos.js') }}"></script>

@endpush

<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>


@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>

            <div class="profile-content-right">
                <div class="profile-content-right-top">
                    <span class="title-usual profile-title">
                        {{ __('frontend.cabinet.My Sponsorship') }}
                    </span>
                    <a href="{{ route('cabinet.sponsorship.create.step1') }}" type="button" class="button-orange text-decoration-none d-flex justify-content-center">
                        <img class="img-fluid"
                             src="{{ asset('images/add-size.svg') }}"
                             alt="{{ __('frontend.cabinet.New Sponsorship') }}"
                             title="{{ __('frontend.cabinet.New Sponsorship') }}">
                        <span>{{ __('frontend.cabinet.New Sponsorship') }}</span>
                    </a>
                </div>


                @if(count($childrens))
                    <div class="your-sponsor profile-right-block d-flex flex-column">
                        <div class="profile-swiper swiper-container swiper">
                            <div class="swiper-wrapper">
                                @foreach($childrens as $item)
                                    <div class="swiper-slide">
                                        @include('site.pages.cabinet.components.sponsor_card', ['gifts' => $gifts, 'item' => $item])
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                @endif

                <div class="create-fundraiser-block d-flex flex-column sdfsdesad">
                    <span class="title-usual profile-title">{{ __('frontend.Form.Create Fundraiser') }}</span>

                    <div class="text-default text-left create-fundraiser-description">
                        {{ __('frontend.Form.Create Fundraiser Text') }}

                    </div>

                    <div class="create-fundraiser-buttons-group">

                        <a href="{{ route('cabinet.fundraisers.create') }}" class="button-orange text-decoration-none"> {{ __('frontend.Form.Create') }}</a>

                        <a class="button-orange button-orange-white text-decoration-none" href="{{route('cabinet.fundraisers.create')}}"> {{ __('frontend.Form.Details') }}</a>
                    </div>
                </div>

                @include('site.components.home1')

            </div>

        </div>
    </div>

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

    @include('site.components.donate_now')
@endsection

@if(count($childrens))
    @foreach($childrens as $key => $child)
        <!-- Modal reports-->
        <div class="modal fade" style="transform: translateY(20%);" id="reportsModal{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border:none; padding:60px 25px;border-radius: 14px;background: #fff">
                    <div class="modal-body">
                        <span class="title-usual text-center">{{__('frontend.cabinet.Reports')}}</span>
                        <div class="modal-reports-list d-flex flex-column">
                            @foreach($child->reports as $report)
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                                        </div>
                                        <a href="{{ $report->getImageUrl('thumbnail', $report->name) }}" class="text-decoration-none border-none" target="_blank">
                                            <span class="modal-report-box-filename-text">{{$report->title}}</span>
                                        </a>
                                    </div>
                                    <div class="modal-report-box-download-icon">
                                        <a href="{{ $report->name }}"  target="_blank"  download>
{{--                                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">--}}
                                        </a>
                                    </div>
                                    <div class="created-section">
                                        {{$report->created_at ?? null}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="donate-modal-close reports-modal-close d-flex justify-content-center align-items-center">
                                <button class="button-orange btn-orange-close" data-bs-dismiss="modal">{{__('frontend.cabinet.Close')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
