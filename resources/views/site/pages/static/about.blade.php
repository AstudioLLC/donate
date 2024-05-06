@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/about-us.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    @include('site.pages.blocks.list', ['items' => $infoBlocks ?? null])
    <div class="container-small about-core-values">
        <h2 class="title-usual">
            {{ __('frontend.Our Core Values') }}
        </h2>
        @include('site.pages.core_values.list', ['items' => $coreValues ?? null])
    </div>
    <div class="container-small local-fundraising">
        <h2 class="title-usual">
            {{ $page->title_content ?? null }}
        </h2>
        <div class="editor">
            {!! $page->content ?? null !!}
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
