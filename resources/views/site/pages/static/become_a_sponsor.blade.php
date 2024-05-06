@extends('site.layouts.app')

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        <div class="page-with-background-relative position-relative">
            @if($page->image)
                <img class="img-fluid d-none d-md-block"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <img class="img-fluid d-md-none"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <div class="page-background-content container-small">
                    <div class="white-right-block">
                        <span class="title-usual white-block-name">{{ $page->title ?? null }}</span>
                        <span class="text-default white-block-description">{!! $page->content ?? null !!}</span>
                        <span class="donation-amount-text">{{ __('frontend.Steps.Donation Amount') }}</span>
                        <div class="amount-amd-text">8000 {{ __('frontend.Gifts.AMD') }}</div>
                        <a href="{{ auth()->user() ? route('cabinet.sponsorship.create.step1') : route('sp-login') }}" class="white-block-sponsor-button text-decoration-none button-orange">
                            {{ __('frontend.Sponsor') }}
                        </a>
                        @include('site.components.share')
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-small my-margin background-page-content">
        <h2 class="title-usual">{{ $page->title_content ?? null }}</h2>
        <div class="page-witch-background-editor text-default">
            {!! $page->sec_content ?? null !!}
        </div>
        <a href="{{ auth()->user() ? route('cabinet.sponsorship.create.step1') : url('login') }}" class="button-orange sponsor-button text-decoration-none">
            {{ __('frontend.Sponsor') }}
        </a>
    </div>
    @include('site.components.frequently_asked_questions')
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
