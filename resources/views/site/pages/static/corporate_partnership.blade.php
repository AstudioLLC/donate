@extends('site.layouts.app')

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">{{ $page->title ?? null }}</h2>

            @if(!empty($page->image))
            <img src="{{ $page->getImageUrl('thumbnail') }}" class="img-fluid img-center p-2">
            @endif
            {!! $page->content ?? null !!}
            <div class="how-to-help-links">
                <div class="row">
                    @if($day_care)
                        <div class="col-6 col-lg-4 p-2 p-md-3">
                            <a href="{{ route('page', ['url' => $day_care->url ?? null] )}}" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                                <span class="d-block help-picture">
                                    @if($day_care->icon)
                                        <img class="img-fluid filter-image"
                                             src="{{ $day_care->getImageUrl('thumbnail', $day_care->icon) }}"
                                             alt="{{ $day_care->title }}"
                                             title="{{ $day_care->title }}">
                                    @endif
                                </span>
                                <span class="help-box-name">{{ $day_care->title ?? null }}</span>
                            </a>
                        </div>
                    @endif
                        @if($current_campaigns)
                            <div class="col-6 col-lg-4 p-2 p-md-3">
                                <a href="{{ route('page', ['url' => $current_campaigns->url ?? null] )}}" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                                <span class="d-block help-picture">
                                    @if($current_campaigns->icon)
                                        <img class="img-fluid filter-image"
                                             src="{{ $current_campaigns->getImageUrl('thumbnail', $current_campaigns->icon) }}"
                                             alt="{{ $current_campaigns->title }}"
                                             title="{{ $current_campaigns->title }}">
                                    @endif
                                </span>
                                    <span class="help-box-name">{{ $current_campaigns->title ?? null }}</span>
                                </a>
                            </div>
                        @endif
                    @if($tailored_project)
                        <div class="col-6 col-lg-4 p-2 p-md-3">
                            <a href="{{ route('page', ['url' => $tailored_project->url ?? null] )}}" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                                <span class="d-block help-picture">
                                    @if($tailored_project->icon)
                                        <img class="img-fluid filter-image"
                                             src="{{ $tailored_project->getImageUrl('thumbnail', $tailored_project->icon) }}"
                                             alt="{{ $tailored_project->title }}"
                                             title="{{ $tailored_project->title }}">
                                    @endif
                                </span>
                                <span class="help-box-name">{{ $tailored_project->title ?? null }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
