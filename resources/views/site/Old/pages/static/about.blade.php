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
                @if(count($aboutContent))
                    @if(!empty($aboutContent['image']) || !is_null($aboutContent['image']))
                        <div class="shadow-over p-4">
                            <img src="{{ asset('u/banners/' . $aboutContent['image']) }}" class="w-full" alt="{{ $aboutContent['title'][$locale] }}">
                        </div>
                    @endif

                    @if($aboutContent['title'][$locale] !== null)
                        <h1 class="text-blue font-bold my-3">{{ $aboutContent['title'][$locale] }}</h1>
                    @endif

                    @if($aboutContent['content'][$locale] !== null)
                        <div class="shadow-over p-5">
                            {!! $aboutContent['content'][$locale] !!}
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
