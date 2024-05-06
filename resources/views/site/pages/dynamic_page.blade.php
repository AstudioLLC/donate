@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/tailored-project.css') }}">
@endpush

@section('content')
    @include('.site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">
                {{ $page->title ?? null }}
            </h2>
            @if($page->image)
                <div class="scr-image-wrap">
                    <img class="w-100"
                         src="{{ $page->getImageUrl('thumbnail') }}"
                         alt="{{ $page->title }}"
                         title="{{ $page->title }}">
                </div>
            @endif
            <div class="tailored-project-description editor text-default">
                {!! $page->content ?? null !!}
            </div>
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
