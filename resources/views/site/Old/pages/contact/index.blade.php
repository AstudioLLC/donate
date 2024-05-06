@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
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
                <div class="flex flex-wrap w-full">
                    <div class="w-full md:w-1/2  shadow-over border border-gray">
                        <div  class="w-full h-full p-3">
                            <a href="https://yandex.ru/maps/org/r_i_v_komfort/231163501477/?utm_medium=mapframe&utm_source=maps"
                               style="color:#eee;font-size:12px;position:absolute;top:0px;">Р и В Комфорт</a><a
                                href="https://yandex.ru/maps/105793/kotayk/category/building_supplies_store/?utm_medium=mapframe&utm_source=maps"
                                style="color:#eee;font-size:12px;position:absolute;top:14px;">Строительный магазин в
                                Области Котайк</a>
                            <iframe src="https://yandex.ru/map-widget/v1/-/CCUAeTeskD" class="w-full h-full"
                                    frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 md:pl-5 flex flex-col ">
                        <div class="p-3 shadow-over border border-gray"><p class="font-bold text-blue">Օրբելի 65
                                Գրասենյակ Երևան, Հայաստան 0028</p>
                            <p class="mt-3 font-bold">Հեռ.: <a href="tel:+374 (10) 22 64 98"> +374 (10) 22 64 98</a></p>
                            <p class="font-bold">Ֆաքս.: <a href=""> +374 (10) 26 72 42</a></p>
                            <p class="text-gray-dark my-2">Էլ. Փոստ: <a href="mailTo:manager@comfort-rv.am">manager@comfort-rv.am</a>
                            </p>
                        </div>
                        <div class="p-3 my-3">
                            <a href="" class="text-white bg-blue px-3 py-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="text-white bg-blue px-3 py-2"><i class="fab fa-twitter"></i></a>
                            <a href="" class="text-white bg-blue px-3 py-2"><i class="fab fa-instagram"></i></a>
                            <a href="" class="text-white bg-blue px-3 py-2"><i class="fab fa-linkedin-in"></i></a>
                            <a href="" class="text-white bg-blue px-3 py-2"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="p-3  shadow-over border border-gray">
                            <form action="" class="flex flex-col md:p-4" method="post">
                                <label class="cursor-pointer text-gray-dark" for="name">* Անուն, Ազգանուն</label>
                                <input type="text" name="name" class="focus:outline-none focus:border-blue border-b border-gray mb-3" id="name" required>
                                <label class="cursor-pointer text-gray-dark" for="email">* Էլ. Փոստ`</label>
                                <input type="email" name="email" class="focus:outline-none focus:border-blue border-b border-gray mb-3" id="email" required>
                                <label class="cursor-pointer text-gray-dark" for="phone">Հեռախոս`</label>
                                <input type="number" name="phone"  class="focus:outline-none focus:border-blue border-b border-gray mb-3" id="phone">
                                <label class="cursor-pointer text-gray-dark" for="theme">* Թեմա`</label>
                                <input type="text" name="theme"  class="focus:outline-none focus:border-blue border-b border-gray mb-3" id="theme" required>
                                <label class="cursor-pointer text-gray-dark" for="message">* Հաղորդագրություն`</label>
                                <textarea name="" id="" cols="30" name="message"  class="focus:outline-none focus:border-blue border-b border-gray mb-3" id="message" rows="3" required></textarea>
                                <p class="text-blue">* -ով դաշտերը պարտադիր են լրացման համար</p>
                                <div class="flex justify-end">
                                    <button type="submit" class="border transition duration-500 ease-in-out bg-white hover:bg-blue hover:text-white mt-4 border-gray h-16 w-full md:w-1/3">Ուղղարկել</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
