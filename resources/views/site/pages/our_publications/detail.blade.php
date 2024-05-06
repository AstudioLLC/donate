@extends('site.layouts.app')
@section('content')
    <main id="app">
        <div class="mb-3 mb-lg-5">
            @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

            <div class="container-small">
                <h1 class="our-publications-info__title my-4 my-lg-5 text-center">{{$item->title}}</h1>
                <img class="w-100" src="{{$item->getImageUrl('thumbnail', $item->imageBig)}}" alt=" " title="">
                <div class="my-4 my-lg-5 editor">
                    {!! $item->title !!}
                </div>

                @if(count($item->files))
                    @foreach($item->files as $file)
                        <a href="{{ $file->getImageUrl('thumbnail', $file->name) }}" class="btn btn-sm btn-icon btn-info" download>
                            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            <span class="btn-inner--text">{{ __('app.Download') }}</span>
                        </a>
                    @endforeach
                @endif
                @include('site.components.share')

            </div>
        </div>
    </main>
@endsection
