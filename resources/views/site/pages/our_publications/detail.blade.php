@extends('site.layouts.app')
@section('content')
    <div class="mb-3 mb-lg-5">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

        <div class="container-small">
            <h1 class="our-publications-info__title my-4 my-lg-5 text-center">{{$item->title}}</h1>
            <img class="w-100" src="{{$item->getImageUrl('thumbnail', $item->imageBig)}}" alt=" " title="">
            <div class="my-4 my-lg-5 editor">
                {!! $item->title !!}
            </div>


            @include('site.components.share')
        </div>
    </div>
@endsection
