@extends('site.layouts.app')

@section('content')
    <div class="mb-4 mb-lg-5">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

        <div class="container-small">
            <h1 class="our-publications-info__title my-4 my-lg-5 text-center">{{$page->title}}</h1>
            <div class="row our-donors-row">
                @foreach($items as $item)
                <div class="col-12 col-sm-6 p-2">
                    <a href="" class="our-donors-link text-decoration-none d-flex flex-column flex-md-row align-items-center">
                        <div class="our-donors-link__img d-flex align-items-center me-3">
                            <img class=" w-100" src="{{ $item->getImageUrl('thumbnail') }}" alt="{{ $item->title }}">
                        </div>
                        <h2 class="our-donors-link__title">{{ $item->title }}</h2>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
