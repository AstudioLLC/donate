@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/success-stories.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-mini">
            <span class="title-usual">{{ $page->title }}</span>
            <div class="success-stories-description text-default text-center">
                {{ $item->title }}
            </div>
            @if($item->imageBig)
                <div class="success-stories-image-wrap">
                    <img class="w-100"
                         src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}"
                         alt="{{ $item->title }}"
                         title="{{ $item->title }}">
                </div>
            @endif
            <div class="success-stories-editor text-default">
                {!! $item->content !!}
            </div>
            @include('site.components.share')
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
