@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/our-donors.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">
                {{ $corporateDonor->title_content ?? null }}
            </h2>
            <div class="our-donors-description text-default">
                {!! $corporateDonor->content ?? null !!}
            </div>
            @if(count($items))
                <div class="mx-0 row block-mt">
                    @include('site.pages.donors.list', ['items' => $items ?? null])
                </div>
            @endif
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
