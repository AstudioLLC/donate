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
            <div class="relative"><img src="{{asset('images/a2.png')}}" alt="">
                <div class="absolute ml-5 flex justify-center items-center  bottom-0">
                    <div class="bg-blue z-10 flex justify-center items-center rounded-full p-2">
                            <img src="{{asset('images/unnamed.jpg')}}" class="rounded-full w-32 h-32" alt="">
                    </div>
                        <p class="rounded-full rounded-l-none  -ml-2 shadow-over px-5 py-2 bg-white">Alaplana Ceramica</p>
                </div>
            </div>
            <p>Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը:  Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus
                Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է:
                Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է:
                Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:</p>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="w-full flex flex-wrap">
                @for($i=0; $i<8; $i++)
                    <div class="w-full  xs:w-1/2 md:w-1/3 p-1 xl:w-1/4">
                        <div class="relative img-gradient image-hover">
                            <div class="  relative">
                                <img src="{{asset('images/unnamed.png')}}" class="w-full" alt="">
                            </div>
                            <div class="absolute bottom-5 z-10 left-5">
                                <p class="text-white">Հատակի ծածկույթ</p>
                                <div class="md:my-5 my-2  hover-block  flex">
                                    <div class="relative mr-1">
                                        <i class="fa fa-caret-left absolute text-xl text-white top-50 translate-rotate-50 right--7"
                                           aria-hidden="true"></i>
                                        <button type="button"
                                                class="w-full md:text-sm text-xss py-0  md:py-3 h-10 md:px-3 px-1 bg-white rounded  flex text-black items-center justify-center">
                                            Տեսնել ապրանքատեսականին
                                        </button>
                                    </div>
                                    <div class="rounded w-auto px-5 ml-2 h-10 flex items-center justify-center  border   border-yellow-custom bg-yellow-custom ">
                                        <a href="http://comfort-rv.loc/product" class="z-10 text-gray-dark md:text-sm text-xs items-center">
                                            <i class="fa fa-long-arrow-alt-right text-white" aria-expanded="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

@endsection
