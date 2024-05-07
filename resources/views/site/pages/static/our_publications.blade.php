@extends('site.layouts.app')
@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

        <div class="page-with-background-relative position-relative">
            <img class="img-fluid" src="{{$page->getImageUrl('thumbnail')}}" alt=" " title="">
            <div class="page-background-content container-small">
                <div class="our-publications-info">
                    <h1 class="our-publications-info__title mb-4">{{$page->title}}</h1>
                    <p class="our-publications-info__text m-0">{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
    @if(count($items))
    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual my-4 my-lg-5"> {{__('frontend.Publications')}} </h2>
            <div class="row our-publications-row">
                @foreach($items as $item)
                <div class="col-12 col-sm-6 col-md-4 p-2">
                    <div class="our-publications-item">
                        <img src="{{$item->getImageUrl('thumbnail', $item->imageBig)}}" alt="" class="w-100">
                        <div class="our-publications-item__info">
                            <p class="our-publications-item__text mb-4 mb-lg-5">{{$item->title}}</p>
                            <a href="{{ route('our.publication.detail', ['url' => $item->url ?? null]) }}" class="button-orange our-publications-item__link text-decoration-none d-block">{{__('frontend.cabinet.Read more')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection
