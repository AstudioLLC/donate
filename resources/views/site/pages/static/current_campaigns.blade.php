@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/current-campaigns.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/day-care-center-card.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/sliders-individual.js') }}"></script>
@endpush

@section('content')
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
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
