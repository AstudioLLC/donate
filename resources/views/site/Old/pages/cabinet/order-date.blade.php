@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="sm:flex hidden ">
            @include('site.components.breadcrumb')
        </div>
        <div class="w-full flex xl:flex-row flex-col">
            <div class="w-full xl:w-1/5 mb-3 sm:mb-8 flex   bottom-0 left-0 bg-white ">
                <div class="sm:flex hidden ">@include('site.pages.cabinet.components.cabinet')</div>
                <div class="xl:hidden p-2 flex items-center">
                    <a href=""><i class="fa fa-arrow-left" aria-expanded="true"></i> </a>
                    <img class="p-2" src="{{asset('images/001-shopping-cart.svg')}}" alt="">
                    <h1 class="p-2">Զամբյուղը</h1>
                </div>
            </div>

            <div class="w-full lg:m-5 flex flex-col ">
                <div class="my-6 flex md:flex-row flex-col justify-center md:justify-end items-center">
                    <p class="text-sm p-3 md:p-0">Դիտել կատարած գնումները ըստ ամսաթվի</p>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <div class="relative">
                            <select class="block appearance-none w-full bg-white shadow-over text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray">
                                <option>05.11.2020 - 25.12.2020</option>
                                <option>05.11.2020 - 25.12.2020</option>
                                <option>05.11.2020 - 25.12.2020</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-id="ord202020"
                     class="rounded my-2 order-date-id flex flex-wrap bg-gray-light px-3  justify-between cursor-pointer items-center text-gray-darker">
                    <p>Պատվերի կատարման ամսաթիվը<span
                            class="font-bold px-5 ">25.12.2020</span></p>
                    <div class="md:px-3 flex justify-between md:w-auto w-full items-center">
                        <p class="my-1 md:m-2 bg-yellow-custom w-40 flex items-center  h-10 text-white p-2 md:p-3">
                            Ուղարկված Է</p>
                        <i class="fa fa-angle-up"></i></div>
                </div>
                <div id="ord202020" class="hidden flex w-full justify-end lg:px-5 lg:shadow-over p-5   flex-col">
                    <table id="order-data-table" class=" table-responsive table  table-auto">
                        <thead>
                        <tr class="text-gray-dark text-left ">
                            <th></th>
                            <th class="font-normal px-1 py-2">
                                Ապրանքի անվանում
                            </th>
                            <th class="font-normal px-1 ">Գին
                            </th>
                            <th class="font-normal px-1 ">Քանակ
                            </th>
                        </tr>
                        </thead>
                        <tbody class=" ">
                        <tr class="text-left">
                            <td class="td-image"><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-5 sm:px-1 py-2">185,400Դ</td>
                            <td class=" px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="sm:border-none font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ
                                17611
                            </td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2"> 1</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="text-xl w-auto text-right my-5">Ընդհանուր արժեքը՝ <span class="font-bold ">185,400Դ</span>
                    </p>
                </div>
                <div data-id="ord202sdf10"
                     class="my-2 order-date-id flex flex-wrap  bg-gray-light px-3  justify-between cursor-pointer items-center text-gray-darker">
                    <p>Պատվերի կատարման ամսաթիվը<span
                            class="font-bold px-5 ">25.12.2020</span></p>
                    <div class="md:px-3 flex justify-between md:w-auto w-full items-center">
                        <div class="my-1 md:m-2 bg-pink-custom w-40 flex items-center  h-10 text-white p-2 md:p-3">
                            Մերժված Է
                        </div>
                        <i class="fa fa-angle-up"></i></div>
                </div>
                <div id="ord202sdf10" class="hidden flex w-full justify-end lg:px-5 lg:shadow-over p-5 flex-col">
                    <table id="order-data-table" class="table  table-auto">
                        <thead>
                        <tr class="text-gray-dark text-left ">
                            <th></th>
                            <th class="font-normal px-1 py-2">
                                Ապրանքի անվանում
                            </th>
                            <th class="font-normal px-1 ">Գին
                            </th>
                            <th class="font-normal px-1 ">Քանակ
                            </th>
                        </tr>
                        </thead>
                        <tbody class=" ">
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-5 sm:px-1 py-2">185,400Դ</td>
                            <td class=" px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="sm:border-none font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ
                                17611
                            </td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2"> 1</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="text-xl w-auto text-right my-5">Ընդհանուր արժեքը՝ <span class="font-bold ">185,400Դ</span>
                    </p>
                </div>
                <div data-id="ord20210"
                     class="my-2 order-date-id flex flex-wrap  bg-gray-light px-3  justify-between cursor-pointer items-center text-gray-darker">
                    <p>Պատվերի կատարման ամսաթիվը<span
                            class="font-bold px-5 ">25.12.2020</span></p>
                    <div class="md:px-3 flex justify-between md:w-auto w-full items-center">
                        <div class="my-1 md:m-2 bg-green w-40 flex items-center  h-10 text-white p-2 md:p-3">Հաստատված
                            Է
                        </div>
                        <i class="fa fa-angle-up"></i></div>
                </div>
                <div id="ord20210" class="hidden flex w-full justify-end lg:px-5 lg:shadow-over p-5 flex-col">
                    <table id="order-data-table" class="table  table-auto">
                        <thead>
                        <tr class="text-gray-dark text-left ">
                            <th></th>
                            <th class="font-normal px-1 py-2">
                                Ապրանքի անվանում
                            </th>
                            <th class="font-normal px-1 ">Գին
                            </th>
                            <th class="font-normal px-1 ">Քանակ
                            </th>
                        </tr>
                        </thead>
                        <tbody class=" ">
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-5 sm:px-1 py-2">185,400Դ</td>
                            <td class=" px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="sm:border-none font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ
                                17611
                            </td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2">1</td>
                        </tr>
                        <tr class="text-left">
                            <td><img src="{{asset('images/qwe.png')}}" alt=""></td>
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2"> 1</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="text-xl w-auto text-right my-5">Ընդհանուր արժեքը՝ <span class="font-bold ">185,400Դ</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/cabinet.js')}}"></script>
@endsection
