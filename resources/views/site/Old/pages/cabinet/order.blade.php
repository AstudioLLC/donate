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
                <div class="flex w-full lg:px-5 lg:shadow-over p-5  flex-row md:flex-col">
                    <table id="order-table" class="table  table-auto">
                        <thead>
                        <tr class="text-gray-dark text-left ">
                            <th class="font-normal px-1 py-2"><i class="far fa-circle text-blue lg:block hidden"></i>
                                Ապրանքի անվանում
                            </th>
                            <th class="font-normal px-1 "><i
                                    class="far fa-circle text-yellow-custom lg:block hidden "></i>Գին
                            </th>
                            <th class="font-normal px-1 "><i class="far fa-circle text-blue lg:block hidden"></i>Քանակ
                            </th>
                            <th class="font-normal px-1 "><i class="far fa-circle text-blue lg:block hidden"></i>Չափ.
                                միա.
                            </th>
                            <th colspan="2" class="font-normal px-1 "><i
                                    class="far fa-circle text-blue lg:block hidden"></i>Ընդհանուր գումար
                            </th>
                        </tr>
                        </thead>
                        <tbody class=" ">
                        <tr class="text-left">
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-5 sm:px-1 py-2">185,400Դ</td>
                            <td class=" px-1 py-2">
                                1
                            </td>
                            <td class="w-full sm:w-1/6 px-1 py-2">մ/ք</td>
                            <td class="font-bold   px-1 py-2">370,800Դ</td>
                        </tr>
                        <tr class="text-left">
                            <td class="sm:border-none font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ
                                17611
                            </td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2">
                                1
                            </td>
                            <td class="w-full sm:w-1/6  px-1 py-2">մ/ք</td>
                            <td class="font-bold   px-1 py-2">370,800Դ</td>
                        </tr>
                        <tr class="text-left">
                            <td class="font-semibold px-1 py-2">Ceramica, Altamura Silver 60X60 Սմ 17611</td>
                            <td class="font-bold px-1 py-2">185,400Դ</td>
                            <td class="px-1 py-2">
                                1
                            </td>
                            <td class="w-full sm:w-1/6 px-1 py-2">մ/ք</td>
                            <td class="font-bold   px-1 py-2">370,800Դ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <form action="" method="">
                    <div class=" flex flex flex-wrap my-5">
                        <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col pr-2"><label>Ա․Ա․Հ․ <sup
                                    class="text-red">*</sup></label>
                            <input
                                class="rounded focus:shadow-over bg-gray-light  focus:bg-white focus:outline-none p-3 text-gray-dark"
                                value="Մարտիրոսյան Կարեն Վահանի">
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col  "><label>Հեռախոսահամար <sup
                                    class="text-red">*</sup></label>
                            <input
                                class="rounded focus:shadow-over bg-gray-light  focus:bg-white focus:outline-none p-3 text-gray-dark"
                                value="+374 93 00 00 00">
                        </div>
                    </div>
                    <div class="container mx-auto mt-20 shadow-custom">
                        <ul id="order-section" class="flex flex-no-wrap w-full lg:w-1/2  bg-grayLighter">
                            <li class=" mr-0 md:mr-1 bg-gray tab-active md:text-center rounded rounded-b-none text-left w-1/2 lg:w-1/3">
                                <a class="w-full inline-block py-3 px-2  text-xs lg:text-md tab_product " data-id="pick-up"
                                   href="javascript:void(0)">Վերցնել տեղում</a>
                            </li>
                            <li class=" bg-gray md:text-center text-left rounded rounded-b-none w-1/3">
                                <a class="w-full tab_product inline-block text-xs lg:text-md  py-3 px-2 text-headerBg " data-id="shipment"
                                   href="javascript:void(0)">Առաքում</a>
                            </li>
                        </ul>
                        <div id="pick-up"
                             class="tab_info border border-gray shadow-over flex flex-col  justify-between p-4">
                            <div class="flex flex-wrap">
                                <div class="w-full sm:w-1/2 lg:w-1/3 p-2  ">
                                    <div class=" shadow-over">
                                        <div class="bg-gray-light p-4 flex justify-between">
                                            <div>
                                                <p class="title">Մասնաճյուղ</p>
                                                <p>Օրբելի 65, խանութ-սրահ</p>
                                            </div>
                                            <div>
                                                <label class="radio-button__label-wrapper" for="VAL1">
                                                    <input type="radio" name="address" id="VAL1" value="1"
                                                           class="radio-button__input">
                                                    <div class="radio-button__custom-indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="bg-white  p-4">
                                            <p class="text-blue my-6">
                                            <span class="bg-gray-light p-2">
                                                <i class="fa fa-phone" aria-expanded="true"></i></span>
                                                <a href="tel:" class="text-black font-bold">+37410743000</a>
                                                <a href="tel:" class="text-black font-bold">+37496704256</a>
                                            </p>
                                            <p class="text-blue my-3"><span class="bg-gray-light p-2"><i
                                                        class="fas fa-envelope"></i></span>
                                                <a href="emailTo:"
                                                   class="text-black font-bold">manager@comfort-rv.am </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 lg:w-1/3 p-2 ">
                                    <div class=" shadow-over">
                                        <div class="bg-gray-light p-4 flex justify-between">
                                            <div><p class="title">Մասնաճյուղ</p>
                                                <p>Օրբելի 65, խանութ-սրահ</p>
                                            </div>
                                            <div>
                                                <label class="radio-button__label-wrapper" for="VAL2">
                                                    <input type="radio" name="address" id="VAL2" value="2" checked
                                                           class="radio-button__input">
                                                    <div class="radio-button__custom-indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="bg-white   p-4">
                                            <p class="text-blue my-6">
                                            <span class="bg-gray-light p-2"><i class="fa fa-phone"
                                                                               aria-expanded="true"></i></span>
                                                <a href="tel:" class="text-black font-bold">+37410743000</a>
                                                <a href="tel:" class="text-black font-bold">+37496704256</a>
                                            </p>

                                            <p class="text-blue my-3"><span class="bg-gray-light p-2"><i
                                                        class="fas fa-envelope"></i></span>
                                                <a href="emailTo:"
                                                   class="text-black font-bold">manager@comfort-rv.am </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 lg:w-1/3 p-2  ">
                                    <div class=" shadow-over">
                                        <div class="bg-gray-light p-4 flex justify-between">
                                            <div><p class="title">Մասնաճյուղ</p>
                                                <p>Օրբելի 65, խանութ-սրահ</p>
                                            </div>
                                            <label class="radio-button__label-wrapper" for="VAL3">
                                                <input type="radio" name="address" id="VAL3" value="3"
                                                       class="radio-button__input">
                                                <div class="radio-button__custom-indicator"></div>
                                            </label>
                                        </div>
                                        <div class="bg-white  p-4">
                                            <p class="text-blue my-6">
                                            <span class="bg-gray-light p-2"><i class="fa fa-phone"
                                                                               aria-expanded="true"></i></span>
                                                <a href="tel:" class="text-black font-bold">+37410743000</a>
                                                <a href="tel:" class="text-black font-bold">+37496704256</a>
                                            </p>

                                            <p class="text-blue my-3"><span class="bg-gray-light p-2"><i
                                                        class="fas fa-envelope"></i></span>
                                                <a href="emailTo:"
                                                   class="text-black font-bold">manager@comfort-rv.am </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-2">
                                <iframe frameborder="0" style="border:0" class="iframe"
                                        src="https://www.google.com/maps/embed/v1/undefined?origin=...&q=...&destination=...&center=...&zoom=...&key=..."
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                        <div id="shipment" class="tab_info hidden  ">
                            <div class="border border-gray shadow-over p-4 flex flex-col  justify-between">
                            <div class="flex flex-wrap">
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col pr-2">
                                <label for="region">Տարածաշրջան  <sup
                                        class="text-red">*</sup></label>
                                    <select id="region" class="form-select block w-full bg-gray border border-gray text-black py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>Երևան</option>
                                        <option>Աշտարակ</option>
                                        <option>Արմավիր</option>
                                    </select>
                                </div>
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col pr-2">
                                <label for="address-delivery">Հասցե  <sup
                                        class="text-red">*</sup></label>
                                <input id="address-delivery" name="address-delivery" type="text" class="rounded focus:shadow-over bg-gray-light  focus:bg-white focus:outline-none p-3 text-gray-dark" value="Լենինգրադյան փող. 38 ">
                                </div>
                                <div class="w-full flex flex-col pr-2 py-5">
                                <label for="desc">Հավելյալ նշումներ  <sup
                                        class="text-red">*</sup></label>
                               <textarea name="w3review" rows="4" cols="50" class="form-textarea bg-gray-light  focus:outline-none border-none focus:shadow-over" id="desc">

                               </textarea>
                                </div>
                            </div>
                            </div>
                            <div class="flex  justify-end py-3">
                                <div class="border flex-col w-full sm:w-auto sm:flex-row flex border-gray p-2 ">
                                    <div class="px-4 m-2 border-dashed border-b border-r-0 sm:border-b-0 sm:border-r border-gray-dark"><p>Արժեք</p>
                                    <p class="font-bold">370,800Դ</p>
                                    </div>
                                    <div class="px-4 m-2 border-dashed border-b border-r-0  sm:border-b-0 sm:border-r border-gray-dark"><p>Առաքման գին</p>
                                    <p class="font-bold">370,800Դ</p>
                                    </div>
                                    <div class="px-4 m-2 "><p >Վճարվող ընդհանուր գումարը</p>
                                    <p class="font-bold">370,800Դ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <p> Ընտրեք վճարման եղանակ</p>
                            <div class="flex flex-wrap w-full">
                                <div class=" w-full sm:w-1/3 lg:w-1/5">
                                <div class="shadow-over m-0 sm:m-2 p-3 flex justify-between items-center">
                                    <label for="asd">Վճարել տեղում</label>
                                    <input type="radio" name="pickup" id="asd"  class="form-checkbox focus:outline-none  text-blue  h-6 w-6 text-gray">
                                </div>
                                </div>
                                <div class=" w-full sm:w-1/3 lg:w-1/5">
                                <div class="shadow-over m-0 sm:m-2 p-3 flex justify-between items-center">
                                    <label> Օնլայն  վճարում</label>
                                    <input type="radio"  name="pickup" class="form-checkbox focus:outline-none  text-blue  h-6 w-6  text-gray">
                                </div>
                                </div>
                                <div class=" w-full sm:w-1/3 lg:w-1/5">
                                <div class="shadow-over m-0 sm:m-2 p-3 flex justify-between items-center">
                                    <label for="pay-all"> Վճարել   ամբողջը</label>
                                    <input type="radio" id="pay-all" name="payment-type" value="pay-all" class="payment form-checkbox focus:outline-none text-blue  h-6 w-6  text-gray">
                                </div>
                                </div>
                                <div class="w-full sm:w-11/12 lg:w-2/5 ">
                                <div class="shadow-over sm:m-2  p-3 flex flex-wrap justify-between items-center">
                                    <label for="prepayment"> Կատարել կանխավճար</label>
                                    <input type="radio" id="prepayment" name="payment-type" value="prepayment" class="payment form-checkbox focus:outline-none text-blue  h-6 w-6 text-gray">
                                    <input type="number" id="price" class="price border w-full mt-3 sm:mt-0 sm:w-1/2  focus:outline-none text-right border-gray rounded  text-gray-darker " disabled>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/cabinet.js')}}"></script>
@endsection
