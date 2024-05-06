@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/background-gray.css') }}">
@endpush

@section('content')
    <div class="background-gray">
        <div class="container-small">
            @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
            <span class="title-usual">{{ $page->title ?? null }}</span>
        </div>
    </div>
    <div class="container-small background-gray-page-editor text-default">
        {!! $page->content ?? null !!}
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
