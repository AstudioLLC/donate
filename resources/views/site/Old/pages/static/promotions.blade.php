@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
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
                {{--<p class="text-blue font-bold my-3">Ֆինանսական հաշվետվություններ needTranslate</p>--}}
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

    @if(count($items))
        <section>
            <div class="container">
                <div class="flex-1 flex flex-wrap">
                    @foreach($items as $item)
                        <div class="w-1/2 xs:w-1/2 md:w-1/2 lg:w-1/4 xl:1/4 px-2 pb-2 flex h-auto">
                            @include('site.components.item-card')
                        </div>
                    @endforeach
                    <div class="w-full pagination-wrapper px-2">
                        {!! $items->links() !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
