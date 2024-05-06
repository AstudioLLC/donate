@extends('site.layouts.app')

@section('content')
<main id="app">
    <div class="mb-4 mb-lg-5">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

        <div class="container-small">
            <h1 class="our-publications-info__title my-4 my-lg-5 text-center">{{$page->title}}</h1>
            <img class="w-100" src="{{$page->getImageUrl('thumbnail')}}" alt=" " title="">
            <div class="tenders-row mt-4 mt-lg-5">
                @foreach($items as $item)

                <div class="tenders-row__item py-3 py-md-4">
                    <div class="editor">
                        {!! $item->content !!}
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</main>
@endsection
