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
            <div class="w-full ">
                @include('site.components.catalog-title', ['title' => 'Տեղեկատվության Էջ'])
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="w-full my-3 ">
                <p>Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի
                    արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է:
                    Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem
                    Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ`
                    բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et
                    Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում:
                    Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի
                    առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                    Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով
                    դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ.
                    Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության
                    1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի
                    աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                    Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի
                    արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է:
                    Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem
                    Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ`
                    բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et
                    Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում:
                    Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի
                    առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                    Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով
                    դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ.
                    Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության
                    1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի
                    աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                    Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի
                    արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է:
                    Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem
                    Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ`
                    բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի "de Finibus Bonorum et
                    Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում:
                    Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի
                    առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:
                    Ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով
                    դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ.
                    Ցիցերոնի "de Finibus Bonorum et Malorum" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության
                    1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի
                    աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` "Lorem ipsum dolor sit amet..", 1.10.32 բաժնից
                    է:</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div id="info-lightgallery" class="flex flex-wrap my-3 border border-gray p-4 shadow-over ">
                @for($i=0; $i<8; $i++)
                    <div class="md:w-1/4 w-1/2 p-2">
                        <div class="item" data-src="{{asset('images/unn.jpg')}}">
                            <img src="{{asset('images/unn.jpg')}}"  alt="">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="w-full my-3 border border-gray p-4 shadow-over ">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/5u0D8wOZulE" frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
