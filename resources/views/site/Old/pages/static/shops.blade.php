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
    @if($addresses && count($addresses))
        <section>
            <div class="container">
                <div class="w-full md:p-5 lg:p-0 lg:m-5">
                    <div class="flex flex-wrap rounded shadow-over w-full">
                        <div class="w-full md:w-1/2 md:pl-5 scroll-shop-bar overflow-y-scroll flex flex-col">
                            @foreach($addresses as $key => $item)
                                @php
                                  if (isset($item->coords) && !empty($item->coords) && !isset($coords)) $coords = $item->coords;
                                @endphp
                                <div class="flex my-2 flex-col items-center md:flex-row">
                                    @if($item->image && !empty($item->image))
                                        <div>
                                            <img src="{{ $item->getImageUrl('thumbnail') }}" class="rounded" alt="">
                                        </div>
                                    @endif
                                    <div class="px-5 flex flex-col justify-between">
                                        <div>
                                            <p class="text-blue font-bold cursor-pointer location-map"
                                               data-src="{{ $item->coords }}">
                                                {{ $item->title }}
                                            </p>
                                            <p class="mt-3 font-bold">
                                                {{ t('Page form.phone') }}
                                                <a href="tel:{{ $item->phone }}">
                                                    {{ $item->phone }}
                                                </a>
                                            </p>
                                            <p class="font-bold">
                                                {{ t('Page form.fax') }}
                                                <a href="javascript:void(0)">
                                                    {{ $item->fax }}
                                                </a>
                                            </p>
                                            <p class="text-gray-dark my-2">
                                                {{ t('Page form.email') }}
                                                <a href="mailTo:{{ $item->email }}">
                                                    {{ $item->email }}
                                                </a>
                                            </p>
                                        </div>
                                        <hr class="text-gray">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="w-full h-full p-3">
                                <iframe
                                    src="{{ isset($coords) ? $coords : null }}"
                                    class="w-full h-full" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0">

                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


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
