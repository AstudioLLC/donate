@extends('site.layouts.app')

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <span class="title-usual">{{ $page->title_content ?? null }}</span>
            @if($page->children)
                @include('site.pages.support_our_programs.list', ['items' => $page->children ?? null])
            @endif
        </div>
    </div>
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection
