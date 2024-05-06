@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <div class="step-pages-construction d-flex flex-column">
                <span class="title-usual">{{ $item->title ?? null }}</span>
                @include('site.includes.steps.breadcrumbs._step3')
                @include('site.includes.steps.forms._step3', ['route' => route('gifts.create.step3', ['url' => $item->url ?? null])])
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
