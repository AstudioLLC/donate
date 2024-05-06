@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/homepage.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/homepage.css') }}">
@endpush

@section('content')
    @if($modal && !$payment)
        <div class="donate_baner_bg">
            <div class="donate_baner_block col-11 col-md-10 col-xl-5">
                <p style="padding: 8px 15px; font-size: 26px; text-align: end;color: #000;font-weight: bold;position:absolute;right:0;cursor:pointer;" class="close_mod"> X </p>
                <img style="width: 100%" src="{{ $modal->getImageUrl('thumbnail') ?? null}} " alt="{{ $modal->title ?? null }}">
                <a class="custom_button" href="{{$modal->url}}" style="">Donate</a>
            </div>
        </div>
    @endif
    @if($payment)
        @include('site.includes.popups.paymentSuccessPopup')
    @endif
    @include('site.includes.slider', ['items' => $slider ?? null])
    <div class="section-greeting my-margin">
        <div class="container-small">
            <span class="title-usual">{{ $page->title_content ?? null }}</span>
            <div class="mb-0 description-usual">
                {!! $page->content ?? null !!}
            </div>
        </div>
        <div class="container-small">
            @include('site.pages.core_values.list', ['items' => $coreValues ?? null])
        </div>
    </div>
    @if(count($fundraisers))
{{--        @include('site.pages.fundraisers.list', ['items' => $fundraisers ?? null])--}}
    @endif

    @if(isset($homeFirstBlock))
        <div class="light-orange-block my-margin">
            <div class="background-absolute">
                <img class="w-100 d-none d-lg-block"
                     src="{{ $homeFirstBlock->getImageUrl('thumbnail', $homeFirstBlock->imageBig) }}"
                     alt="{{ $homeFirstBlock->title }}"
                     title="{{ $homeFirstBlock->title }}">

                <img class="img-fluid d-lg-none"
                     src="{{ $homeFirstBlock->getImageUrl('thumbnail', $homeFirstBlock->imageSmall) }}"
                     alt="{{ $homeFirstBlock->title }}"
                     title="{{ $homeFirstBlock->title }}">
            </div>
            <div class="container-small position-relative">
                <div class="light-orange-flexbox d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column">
                        <span class="light-orange-title">
                            {{ $homeFirstBlock->title }}
                        </span>
                        <div class="light-orange-description">
                            {!! $homeFirstBlock->short !!}
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="light-orange-group d-flex align-items-center light-orange-group-1">
                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['children'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->children }}</span>
                            </div>

                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['year'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->year }}</span>
                            </div>
                        </div>

                        <div class="light-orange-group d-flex align-items-center light-orange-group-2">
                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['donor'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->donor }}</span>
                            </div>

                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['labopratories'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->labopratories }}</span>
                            </div>
                        </div>

                        <div class="light-orange-group d-flex align-items-center light-orange-group-3">
                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['community'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->community }}</span>
                            </div>

                            <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                                <span class="orange-property">{{ $homeFirstBlock->count['beggars'] }}</span>
                                <span class="orange-property-name">{{ $homeFirstBlock->beggars }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($donateBlock && count($donateBlock->childrenForHeader))
        <div class="how-to-help my-margin">
            <div class="container-small">
                <h2 class="title-usual">{{ __('frontend.How to help?') }}</h2>
                <div class="mb-0 description-usual">{{ __('frontend.Choose your option of helping children in need.') }}</div>
                @include('site.pages.support_our_programs.list', ['items' => $donateBlock->childrenForHeader ?? null])
            </div>
        </div>
    @endif

    @if(count($successStories))
        <div class="pictures-block my-margin">
            <div class="container-small">
                <h2 class="title-usual">{{ $successStory->title_content ?? null }}</h2>
                <div class="mb-0 description-usual">{{ __('frontend.Success story intro') }}</div>
            </div>
            <div class="pictures-home">
                <div class="mx-0 row">
                    @foreach($successStories as $item)
                        @if($item->imageSmall)
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                                <a href="{{ route('success_stories.detail', ['url' => $item->url ?? null]) }}">
                                <img class="img-fluid filter-image w-100"
                                     src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}"
                                     alt="{{ $item->title }}"
                                     title="{{ $item->title }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <a href="{{ route('page', ['url' => $successStory->url] )}}" class="text-decoration-none">
                <div class="view-all">
                    {{ __('frontend.See more') }}
                </div>
            </a>
        </div>
    @endif

    <div class="how-does-work my-margin">
        <div class="container-small">
            <h2 class="title-usual">{{ __('frontend.Sponsorship work') }}</h2>

            <div class="how-does-work-boxes">
                <div class="row">
                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                {{ __('frontend.Sponsorship work text1') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                {{ __('frontend.Sponsorship work text2') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                {{ __('frontend.Sponsorship work text3') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if(isset($homeSecondBlock))
        <div class="information-orange-block my-margin position-relative">
            <div class="background-absolute">
                <img class="w-100 d-none d-lg-block"
                     src="{{ $homeSecondBlock->getImageUrl('thumbnail', $homeSecondBlock->imageBig) }}"
                     alt="{{ $homeSecondBlock->title }}"
                     title="{{ $homeSecondBlock->title }}">
                <img class="img-fluid d-lg-none"
                     src="{{ $homeSecondBlock->getImageUrl('thumbnail', $homeSecondBlock->imageSmall) }}"
                     alt="{{ $homeSecondBlock->title }}"
                     title="{{ $homeSecondBlock->title }}">
            </div>

            <div class="container-small position-relative">
                <div class="light-orange-flexbox d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column orange-content">
                        <span class="light-orange-title">
                            {{ $homeSecondBlock->title }}
                        </span>
                        <div class="light-orange-description">
                            {!! $homeSecondBlock->short !!}
                        </div>
                        <a href="{{ $homeSecondBlock->url ?? 'javascript:void(0)' }}" class="button-orange text-decoration-none">
                            {{ __('frontend.Watch the video') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path d="M133.4,118.771l-11.472,5.81a1.814,1.814,0,0,1-1.731-.053,1.7,1.7,0,0,1-.85-1.462V111.483a1.7,1.7,0,0,1,.848-1.461,1.813,1.813,0,0,1,1.729-.056l11.472,5.772a1.685,1.685,0,0,1,0,3.032Z" transform="translate(-119.351 -109.774)" fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="partners my-margin">
        <div class="container-small">
            <h2 class="title-usual">
                {{ $corporateDonor->title_content ?? null }}
            </h2>
            <div class="mb-0 description-usual partners-description">
                {!! $corporateDonor->content ?? null !!}
            </div>
            @if(count($corporateDonors))
                @include('site.pages.donors.home', ['items' => $corporateDonors ?? null])
            @endif
            <a href="{{ route('page', ['url' => $corporateDonor->url]) }}" class="view-all text-decoration-none">{{ __('frontend.See more') }}</a>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
