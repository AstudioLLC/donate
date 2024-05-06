@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/gift-card.css') }}">
@endpush

@push('js')
    <script>
        $('.white-block-sponsor-button').on('click', function() {
            $('html,body').animate({scrollTop:$('.gift-row').offset().top+"px"},{duration:1E3});
        });
    </script>
@endpush

@section('content')
    @if($payment)
        @include('site.includes.popups.paymentSuccessPopup')
    @endif
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        <div class="page-with-background-relative position-relative">
            @if($page->image)
                <img class="img-fluid d-none d-md-block"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <img class="w-100 d-md-none"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <div class="page-background-content container-small">
                    <div class="white-right-block">
                        {!! $page->sec_content ?? null !!}
                         <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">{{__('frontend.Gifts.Give')}}</a>
                        @include('site.components.share')
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-small my-margin background-page-content">
        <h2 class="title-usual">{{ $page->title_content ?? null }}</h2>
        <div class="page-witch-background-editor text-default">
            {!! $page->content ?? null !!}
        </div>
    </div>
    @if(count($gifts))
        <div class="container-small my-margin">
            <h2 class="title-usual">{{ __('frontend.Give a gift. Make a change!') }}</h2>
            @include('site.pages.gifts.list', ['items' => $gifts ?? null])
        </div>
    @endif
    @include('site.components.frequently_asked_questions')
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
