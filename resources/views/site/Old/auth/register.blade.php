@extends('site.layouts.app', ['headerSidebar' => true])
@section('title', 'Login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="">
            <div class="flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full">
                    <div>
                        <h2 class="mt-6 text-center text-3xl leading-9 text-blue">
                            Գրանցվել
                        </h2>
                    </div>
                    <form class="mt-8" action="#" method="POST">
                        <input type="hidden" name="remember" value="true">
                        <div class="rounded-md shadow-sm">
                            <div class="my-5">
                                <input name="email" type="email" required
                                       class="relative block w-full px-3 py-2 border-b border-gray placeholder-gray-500  rounded-t-md focus:outline-none  sm:text-sm "
                                       placeholder="Անուն">
                            </div>
                            <div class="my-5">
                                <input name="email" type="email" required
                                       class="appearance-none rounded-none  border-b border-gray relative block w-full px-3 py-2 border-b-1 border-gray placeholder-gray-500  focus:outline-none   sm:text-sm sm:leading-5"
                                       placeholder="Էլ,Հասցե">
                            </div>
                            <div class="my-5  flex border-b border-gray">
                                <input name="password" type="password" required
                                       class="appearance-none rounded-none relative  block w-full px-3 py-2 border-b-1 border-gray placeholder-gray-500  focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                       placeholder="Գաղտնաբար">
                                <div class="typeChange cursor-pointer focus:outline-none"><i class="fa fa-eye text-gray cursor-pointer "></i>
                                    <i class="fa fa-eye-slash hidden text-gray cursor-pointer "></i></div>
                            </div>
                            <div class="my-5">
                                <input name="repeatPass" type="text" required
                                       class="appearance-none rounded-none relative  border-b border-gray block w-full px-3 py-2 border-b-1 border-gray placeholder-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                       placeholder="Կրկնել գաղտնաբառ">
                            </div>
                        </div>

                        <div class="mt-6 w-full text-center flex justify-center">
                            <button type="submit"
                                    class="group relative w-full sm:w-1/2 flex  justify-center items-center py-2 px-4  bg-blue text-white focus:outline-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12.654" height="12.654"
                                     viewBox="0 0 12.654 12.654">
                                    <g id="Group_6613" data-name="Group 6613" transform="translate(-1196 -569.974)">
                                        <path id="Path_11219" data-name="Path 11219"
                                              d="M177.955.008c-.013,0-.024-.008-.038-.008H172.25a1.584,1.584,0,0,0-1.582,1.582v.527a.527.527,0,1,0,1.054,0V1.582a.528.528,0,0,1,.527-.527h2.456l-.161.054a1.06,1.06,0,0,0-.714,1v7.909H172.25a.528.528,0,0,1-.527-.527V8.436a.527.527,0,1,0-1.054,0V9.491a1.584,1.584,0,0,0,1.582,1.582h1.582V11.6a1.056,1.056,0,0,0,1.054,1.055,1.106,1.106,0,0,0,.336-.052l3.168-1.056a1.06,1.06,0,0,0,.714-1V1.055A1.056,1.056,0,0,0,177.955.008Zm0,0"
                                              transform="translate(1029.55 569.974)" fill="#fcfbfb"/>
                                        <path id="Path_11220" data-name="Path 11220"
                                              d="M5.645,108.926l-2.109-2.109a.527.527,0,0,0-.9.373v1.582H.527a.527.527,0,0,0,0,1.055H2.636v1.582a.527.527,0,0,0,.9.373l2.109-2.109A.527.527,0,0,0,5.645,108.926Zm0,0"
                                              transform="translate(1196 465.947)" fill="#fcfbfb"/>
                                    </g>
                                </svg>
                                <p class="px-2">Գրանցվել</p>
                            </button>
                        </div>
                    </form>
                    <div class="items-center mt-10 flex flex-col justify-center">
                        <p class="connect border-b border-gray-dark w-1/3 text-gray-darker"><span>Կամ</span></p>
                        <div class="flex flex-row">
                            <a href=""
                                class="cursor-pointer m-2 group bg-pink-custom h-12  transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-pink-custom items-center justify-around flex hover:bg-blue-700 text-white font-bold sm:p-1 p-0 rounded-full">
                                <div class="rounded-full h-4 p-5 w-4  text-pink-custom group-hover:text-white group-hover:bg-pink-custom flex items-center justify-center bg-white">
                                    <i class="fab fa-google "></i>
                                </div>
                                <p class="sm:px-4 px-0 sm:block hidden">Google</p>
                            </a>
                            <a href=""
                                class="cursor-pointer m-2  group bg-blue-fb h-12 transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-blue-fb items-center justify-around flex text-white font-bold sm:p-1 p-0 rounded-full">
                                <div class="rounded-full h-4 p-5 w-4   text-blue-fb group-hover:text-white group-hover:bg-blue-fb flex items-center justify-center bg-white">
                                    <i class="fab fa-facebook-f "></i>
                                </div>
                                <p class="sm:px-4 px-0 sm:block hidden ">Facebook</p>
                            </a>
                            <a href=""
                                class="cursor-pointer m-2 group h-12   bg-blue-mail transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-blue-mail items-center justify-around flex text-white font-bold sm:p-1 p-0  rounded-full">
                                <div class="rounded-full h-4 p-5 w-4  text-blue-mail group-hover:text-white group-hover:bg-blue-mail flex items-center justify-center bg-white">
                                    <i class="fas fa-at"></i>
                                </div>
                                <p class="sm:px-4 px-0 sm:block hidden">Mail.ru</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
        @section('js')
            <script src="{{asset('js/auth.js')}}"></script>
@endsection
