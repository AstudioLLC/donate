@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/day-care-center-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
    <div class="page-wrap">
        <div class="container">
            <h2 class="title-usual">{{__('frontend.cabinet.Thank you for your donation!')}}</h2>
            @foreach($fundraisers as $fundraiser)
                @if($fundraiser->id == $succ_donation->fundraiser_id)
                <div class="mx-0 row block-mt">
                    <div class="col-12 col-sm-6 col-lg-7 m-auto p-5 d-flex flex-column care-center-card">
                        <div class="care-center-image-wrap">
                            @if($fundraiser->imageSmall)
                                <a href="{{ route('fundraisers.detail', ['url' => $fundraiser->url ?? null]) }}" class="text-decoration-none">
                                    <img class="w-100"
                                         src="{{ $fundraiser->getImageUrl('thumbnail', $fundraiser->imageSmall) }}"
                                         alt="{{ $fundraiser->title }}"
                                         title="{{ $fundraiser->title }}">
                                </a>
                            @endif
                        </div>
                        <div class="care-center-card-wrap">
                            <a href="{{ route('fundraisers.detail', ['url' => $fundraiser->url ?? null]) }}" class="text-decoration-none">
                                <span class="care-center-card-name">{{ $fundraiser->title ?? null }}</span>
                            </a>
                            @if(isset($fundraiser))
                                @push('js')
                                    <script>
                                        {
                                            let width = 1;
                                            let elem = document.getElementsByClassName("myBar");
                                            let totalValue = document.getElementsByClassName('data-total');
                                            let reachedValue = document.getElementsByClassName('reached-value');


                                            for (let i = 0; i < elem.length; i++) {
                                                let params = {
                                                    width: width,
                                                    elem: elem[i],
                                                    totalValue: totalValue[i].getAttribute('data-total'),
                                                    reachedValue: reachedValue[i].getAttribute('data-reached'),
                                                    interval: null,
                                                };

                                                params.width = params.reachedValue / params.totalValue * 100;

                                                params.interval = setInterval(frame, 50, params);
                                            }


                                            function frame(aParams) {
                                                clearInterval(aParams.interval);
                                                aParams.width++;
                                                aParams.elem.style.backgroundColor = '#3B9DE2';
                                                aParams.elem.style.width = aParams.width + '%';
                                            }
                                        }
                                    </script>
                                @endpush

                                <div class="progressbar-component">
                                <span class="first-sponsor">
                                    @if($donations ?? null)
                                        @foreach($donations as $donation)
                                            @if($donation->fundraiser_id == $fundraiser->id)
                                                {{$donation->fullname}}
                                            @endif
                                        @endforeach
                                    @endif
                                </span>
                                    <div class="d-flex justify-content-between align-items-center progressbar-top">
                                        <div class="reached-value" data-reached="{{ $fundraiser->collected }}">
                                        <span class="reached-value-span">
                                            {{ __('frontend.Fundraisers.reached') }}
                                        </span>
                                            {{ $fundraiser->collected }}
                                        </div>
                                        <div class="left-value" data-left="{{ $fundraiser->cost - $fundraiser->collected }}">
                                            <span>{{ __('frontend.Fundraisers.left') }}</span>
                                            <span class="left-value-inner">
                                                {{ $fundraiser->cost - $fundraiser->collected }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="myProgress progressbar-middle">
                                        <div class="myBar">
                                            <div class="myBar-dots myBar-dots-left"></div>
                                            <div class="myBar-dots myBar-dots-right"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center progressbar-bottom">
                                        <div class="progress-bottom-text">
                                            {{ __('frontend.Fundraisers.goal') }}
                                        </div>
                                        <div class="progress-bottom-text data-total" data-total="{{ $fundraiser->cost }}">
                                            {{ $fundraiser->cost }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
