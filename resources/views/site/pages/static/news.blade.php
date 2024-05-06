@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/event-card.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">{{ $page->title ?? null }}</h2>

            @if(count($news))
                <div class="mx-0 row block-mt">
                    @include('site.pages.news.list', ['items' => $news ?? null])
                </div>
            @endif
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
