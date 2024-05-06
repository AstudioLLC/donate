@extends('site.layouts.app', ['headerSidebar' => true])
@section('title', 'Login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="">
            <div class="w-full p-5 shadow-over">
                <div class="my-5 flex">
                    <div class="relative ">
                        <i class="fa fa-caret-left absolute text-xl text-black top-50 translate-rotate-50 right--7"
                           aria-hidden="true"></i>
                        <button type="button"
                                class="w-full h-10 px-3 md:text-sm text-xs bg-black rounded flex text-white items-center justify-center">
                            Մեծածախ գնորդ
                        </button>
                    </div>
                </div>
                <p class="sm:text-md text-sm">Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված
                    տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000
                    տարեկան է:</p>
                <div class="my-5 flex gap-1">
                    <div class="relative ">
                        <i class="fa fa-caret-left absolute text-xl text-black top-50 translate-rotate-50 right--7"
                           aria-hidden="true"></i>
                        <button type="button"
                                class="w-full h-10 px-3 md:text-sm text-xs  bg-black rounded flex text-white items-center justify-center">
                            Մեծածախ գնորդ
                        </button>
                    </div>
                </div>
                <p class="sm:text-md text-sm">Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված
                    տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000
                    տարեկան է:</p>
            </div>
            <form class="mt-8" action="#" method="POST">
                <div class=" text-center flex flex-wrap justify-between items-center bg-gray-light p-5">
                    <div class="flex flex-wrap">
                        <div class="flex items-center mr-2 sm:mr-4 mb-4">
                            <input id="radio1" type="radio" name="radio" class="hidden"/>
                            <label for="radio1" class="flex items-center cursor-pointer">
                                <span class="w-4 h-4 inline-block mr-1 border border-gray-dark"></span>
                                <span class="md:text-sm text-xs ">Մեծածախ գնորդ</span></label>
                        </div>
                        <div class="flex items-center mr-0 sm:mr-4 mb-4">
                            <input id="radio2" type="radio" name="radio" class="hidden"/>
                            <label for="radio2" class="flex items-center cursor-pointer">
                                <span class="w-4 h-4 inline-block mr-1 border text-xs sm:text-md border-gray-dark"></span>
                                <span class="md:text-sm text-xs ">Մանրածախ գնորդ</span></label>
                        </div>
                    </div>
                    <div class=" text-right  sm:w-1/7">
                    <button type="submit"  class="group relative  flex  justify-center items-center py-2 px-4  bg-pink-custom  rounded text-white focus:outline-none ">
                        <i class="fas fa-paper-plane"></i>
                        <p class="px-2 sm:text-md  text-sm">Շարունակել</p>
                    </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('js/auth.js')}}"></script>
@endsection
