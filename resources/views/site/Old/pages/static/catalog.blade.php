@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center">
        <div class="w-full">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <section>
        <div class="container">
            @if($title[$locale] !== null)
                @component('site.components.catalog-title', ['title' => $title[$locale] ?? null, 'image' => $pageContent['image'] ?? null])@endcomponent
            @endif

            @if(count($files))
                @foreach($files as $file)
                    @component('site.components.catalog', ['item' => $file])@endcomponent
                @endforeach
            @endif
        </div>
    </section>

    <section>
        <div class="container">
            @if(count($gallery))
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/info.js') }}"></script>
@endsection
