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
            <div class="w-full my-5">
                <div class="shadow-over p-4">
                    <img src="{{asset('images/banner3.png')}}" class="w-full" alt="">
                </div>
                <h1 class="text-blue font-bold my-3">Մեր Մասին</h1>
                <div class="shadow-over p-5">
                    <p>«Ռ և Վ Կոմֆորտ» ընկերությունը հիմնադրվել է 1998 թվականին որպես «Արձագանք 2000» ՍՊԸ և «Արգո-7»
                        ընկերությունների իրավահաջորդը: Այն Հայաստանում առաջատար կազմակերպություններից մեկն է, որը
                        ներմուծում է շինարարական նյութեր, կատարում նախագծային աշխատանքներ և իրագործում կառուցապատումներ:

                        Ընկերությունը համագործակցում է արտասահմանյան հայտնի արտադրողների հետ, հանդիսանալով նրանցից
                        շատերի բացառիկ ներկայացուցիչը, և շինարարական նյութեր է ներմուծում աշխարհի տարբեր երկրներից՝
                        Իտալիայից, Իսպանիայից, Գերմանիայից, ԱՄՆ-ից, Իրանից, Չինաստանից, Բուլղարիայից, Ֆրանսիայից,
                        Հոլանդիայից, Պորտուգալիայից և այլն:

                        «Ռ և Վ Կոմֆորտ»-ի խանութների ցանցում կարող եք գտնել հատակների և պատերի համար նախատեսված բազմաոճ
                        և բազմատեսակ երեսպատման սալիկներ, բնական քարեր, խողովակներ, գիպսաստվարաթղթե սալեր, սոսինձներ, սև
                        և գալվանացված մետաղական թիթեղներ, սանիտարական կերամիկա, լողավազանի համար անհրաժեշտ նյութեր,
                        զտիչներ, դռներ և մի շարք այլ ապրանքատեսակներ:

                        «Ռ և Վ Կոմֆորտ» ընկերությունն իր սպառողին առաջակում է բարձրորակ ապրանքատեսականի և բարձրակարգ
                        սպասարկում՝ երաշխավորելով շահագործման երկարարատևություն և հարմարավետություն: Ապրանքերի
                        բազմազանությունն ու ցածր գները կբավարարեն նույնիսկ ամենախստապահանջ հաճախորդին:

                        Ընկերության ներմուծած իսպանական Peronda և իտալական ABK ընկերությունների արտադրած սալիկները 2008
                        թ. Երևանում «Արդյունաբերողների և գործարարների միության» կողմից կազմակերպված ցուցահանդեսում
                        արժանացել են «Տարվա ապրանքատեսակ» ազգային մրցանակիին:

                        2001 թ. Ժնևում (Շվեյցարիա) «Ռ և Վ Կոմֆորտ» կազմակերպությանը շնորհվել է որակի միջազգային մրցանակ:

                        2011 թ. Մադրիդում ընկերությունը ստացել է միջազգային պարգև՝ որպես շուկայում իմիջի և որակի
                        առաջատար:

                        2012 թ. «Ռ և Վ Կոմֆորտ» ընկերության նախագահ Ռ. Շախմուրադյանը Համաշխարհային բանկի կողմից
                        պարգևատրվել է շնորհակալագրով,որպես առավել թափանցիկ գործունեություն վարող:

                        2015թ. «Ռ և Վ Կոմֆորտ»-ին ՀՀ առևտրաարդյունաբերական պալատի որոշմամբ շնորհվել է «Մերկուրի» մրցանակ
                        շինանյութ մատակարարող առաջատար ընկերություն անվանակարգում:</p>
                </div>
                <p class="text-blue font-bold my-3">Ֆինանսական հաշվետվություններ</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="flex flex-wrap">
                <a class="text-white bg-yellow-custom flex items-center flex-row rounded-full m-1 p-1" href="" download="">
                    <p class="bg-white rounded-full flex items-center justify-center h-8 w-8 text-yellow-custom">
                        <i class="fa fa-eye"></i>
                    </p>
                    <p class="px-3"> 2015թ.</p>
                </a>
                <a class="text-white bg-yellow-custom flex items-center flex-row rounded-full m-1 p-1" href="" download="">
                    <p class="bg-white rounded-full flex items-center justify-center h-8 w-8 text-yellow-custom">
                        <i class="fa fa-eye"></i>
                    </p>
                    <p class="px-3"> 2015թ.</p>
                </a>
            </div>
            <div id="about-lightgallery" class="flex flex-wrap my-3  ">
                @for($i=0; $i<4; $i++)
                    <div class="md:w-1/4 w-1/2 p-2">
                        <div class="item cursor-pointer" data-src="{{asset('images/priz1.png')}}">
                            <img src="{{asset('images/priz1.png')}}" alt="">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
