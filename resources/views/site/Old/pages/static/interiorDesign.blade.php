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
            <div class="w-full my-5">
                @if(count($pageContent))
                    @if(!empty($pageContent['image']) || !is_null($pageContent['image']))
                        <div class="shadow-over p-4">
                            <img src="{{asset('u/banners/' . $pageContent['image'])}}" class="w-full" alt="{{ $pageContent['title'][$locale] }}">
                        </div>
                    @endif

                    @if($pageContent['title'][$locale] !== null)
                        <h1 class="text-blue font-bold my-3">{{ $pageContent['title'][$locale] }}</h1>
                    @endif

                    @if($pageContent['content'][$locale] !== null)
                        <div class="shadow-over p-5">
                            {!! $pageContent['content'][$locale] !!}
                        </div>
                    @endif

                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            @if(count($files))
                <div class="flex flex-wrap">
                    @foreach($files as $file)
                        @if($file->name)
                            @component('site.components.file', ['file' => $file])@endcomponent
                        @endif
                    @endforeach
                </div>
            @endif

            @if(count($gallery))
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
