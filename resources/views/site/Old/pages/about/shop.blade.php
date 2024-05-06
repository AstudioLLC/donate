@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center">
        <div class="w-full ">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <section>
        <div class="container">
            <div class="w-full md:p-5">
                <div class="flex flex-wrap rounded shadow-over w-full">
                    <div class="w-full md:w-1/2 md:pl-5 scroll-shop-bar overflow-y-scroll flex flex-col ">
                        <div class="flex my-2 flex-col items-center md:flex-row">
                            <div>
                                <img src="{{asset('images/big.png')}}" class="rounded" alt="">
                            </div>
                            <div class="px-5 flex flex-col justify-between">
                                <div><p class="text-blue font-bold cursor-pointer  location-map"
                                        data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3049.5540597972213!2d44.493537515717705!3d40.152216079607435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc172fb71c87%3A0x1c5c4f4f32543d3!2sR%26V%20COMFORT!5e0!3m2!1sen!2s!4v1604934395213!5m2!1sen!2s">
                                        Օրբելի 65 Գրասենյակ Երևան,
                                        Հայաստան 0028</p>
                                    <p class="mt-3 font-bold">Հեռ.: <a href="tel:+374 (10) 22 64 98"> +374 (10) 22 64
                                            98</a>
                                    </p>
                                    <p class="font-bold">Ֆաքս.: <a href=""> +374 (10) 26 72 42</a></p>
                                    <p class="text-gray-dark my-2">Էլ. Փոստ: <a href="mailTo:manager@comfort-rv.am">manager@comfort-rv.am</a>
                                    </p>
                                </div>
                                <hr class=" text-gray">
                            </div>
                        </div>
                        @for($i=0; $i<5 ;$i++)
                            <div class="flex my-2 flex-col items-center md:flex-row">
                                <div>
                                    <img src="{{asset('images/big.png')}}" class="rounded" alt="">
                                </div>

                                <div class="px-5 flex flex-col justify-between">
                                    <div><p class="text-blue font-bold cursor-pointer  location-map"
                                            data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.717216411043!2d44.48542881571869!3d40.19310627713271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd0d3cba826b%3A0xd44936764caefe7b!2sR%26V%20Comfort!5e0!3m2!1sen!2s!4v1604935061260!5m2!1sen!2s">
                                            Օրբելի 65 Գրասենյակ Երևան,
                                            Հայաստան 0028</p>
                                        <p class="mt-3 font-bold">Հեռ.: <a href="tel:+374 (10) 22 64 98"> +374 (10) 22
                                                64 98</a>
                                        </p>
                                        <p class="font-bold">Ֆաքս.: <a href=""> +374 (10) 26 72 42</a></p>
                                        <p class="text-gray-dark my-2">Էլ. Փոստ: <a href="mailTo:manager@comfort-rv.am">manager@comfort-rv.am</a>
                                        </p>
                                    </div>
                                    <hr class=" text-gray">
                                </div>
                            </div>
                        @endfor
                    </div>


                    <div class="w-full md:w-1/2  ">
                        <div class="w-full h-full  p-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3049.5540597972213!2d44.493537515717705!3d40.152216079607435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc172fb71c87%3A0x1c5c4f4f32543d3!2sR%26V%20COMFORT!5e0!3m2!1sen!2s!4v1604934395213!5m2!1sen!2s"
                                class="w-full h-full" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
