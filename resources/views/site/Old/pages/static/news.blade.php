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
                @if(count($newsContent))
                    @if(!empty($newsContent['image']) || !is_null($newsContent['image']))
                        <div class="shadow-over p-4">
                            <img src="{{ asset('u/banners/' . $newsContent['image']) }}" class="w-full" alt="{{ $newsContent['title'][$locale] }}">
                        </div>
                    @endif

                    @if($newsContent['title'][$locale] !== null)
                        <h1 class="text-blue font-bold my-3">{{ $newsContent['title'][$locale] }}</h1>
                    @endif

                    @if($newsContent['content'][$locale] !== null)
                        <div class="shadow-over p-5">
                            {!! $newsContent['content'][$locale] !!}
                        </div>
                    @endif
                @endif

                @if(count($news))
                    <div class="w-full flex flex-wrap justify-start items-stretch py-4">
                        @foreach($news as $item)
                            <div class="xl:w-1/3 p-2 sm:w-1/2 w-full h-auto flex">
                                @include('site.components.news', ['item' => $item])
                            </div>
                        @endforeach
                    </div>
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
    <script src="{{ asset('js/info.js') }}"></script>
@endsection
