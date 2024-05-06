@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/day-care-center-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
    @if($payment)
{{--        @include('site.includes.popups.paymentSuccessPopup')--}}
        @include('site.components.success_payment', ['succ_donation' => $succ_donation])
    @else
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">{{ $page->title_content ?? null }}</h2>
            @if(count($fundraisers))
                <div class="mx-0 row block-mt">
                    @foreach($fundraisers as $item)
                        @include('site.pages.fundraisers.card', ['item' => $item])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @include('site.components.frequently_asked_questions')
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
    @endif

@endsection
