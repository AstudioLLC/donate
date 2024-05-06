@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/swiper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/homepage.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/homepage.css') }}">
@endpush

@section('content')
    <div class="section-swiper">
        <div class="swiper-container main-swiper-container d-flex justify-content-center">
            <div class="swiper-wrapper">
                <div class="swiper-slide main-swiper-slide-box">
                    <div class="slide-box position-relative d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('images/slider-image.png') }}" alt="" title="">
                        <div class="slide-box-content container position-absolute">
                            <span class="slide-box-name">ՓՈԽԻՐ ԴԺՎԱՐ ՊԱՅՄԱՆՆԵՐՈՒՄ ԱՊՐՈՂ ԵՐԵԽԱՅԻ ԿՅԱՆՔԸ</span>
                            <a href="#" class="d-block button-orange text-decoration-none">Դարձիր հովանավոր</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide main-swiper-slide-box">
                    <div class="slide-box position-relative d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('images/slider-image.png') }}" alt="" title="">
                        <div class="slide-box-content container position-absolute">
                            <span class="slide-box-name">ՓՈԽԻՐ ԴԺՎԱՐ ՊԱՅՄԱՆՆԵՐՈՒՄ ԱՊՐՈՂ ԵՐԵԽԱՅԻ ԿՅԱՆՔԸ</span>
                            <a href="#" class="d-block button-orange text-decoration-none">Դարձիր հովանավոր</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination main-swiper-pagination"></div>

            <div class="main-swiper-buttons header-container">
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 20 36">
                        <g transform="translate(0)">
                            <path d="M118.164,17.012,135.293.407a1.465,1.465,0,0,1,2.03,0,1.368,1.368,0,0,1,0,1.973L121.211,18l16.11,15.617a1.368,1.368,0,0,1,0,1.973,1.465,1.465,0,0,1-2.031,0l-17.129-16.6a1.367,1.367,0,0,1,0-1.976Z" transform="translate(-117.742 0)" fill="#fff"/>
                        </g>
                    </svg>
                </div>

                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 20 36">
                        <g transform="translate(0)">
                            <path d="M137.32,17.012,120.192.407a1.465,1.465,0,0,0-2.03,0,1.368,1.368,0,0,0,0,1.973L134.274,18l-16.11,15.617a1.368,1.368,0,0,0,0,1.973,1.465,1.465,0,0,0,2.031,0l17.129-16.6a1.367,1.367,0,0,0,0-1.976Z" transform="translate(-117.742 0)" fill="#fff"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="section-greeting my-margin">
        <div class="container-small">
            <span class="title-usual">Ողջույն, մենք Donate.am-ն ենք։</span>
            <div class="mb-0 description-usual">
                Donate.am-ը Վորլդ Վիժն Հայաստանի կողմից ստեղծված առցանց հարթակ է, որը մեր աջակիցներին հնարավորություն է տալիս մասնակցել նվիրատվական արշավների:
            </div>
        </div>

        <div class="container-small">
            <div class="row mx-0 about-boxes">
                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/value-people.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք արժևորում ենք մարդկանց</span>

                        <div class="about-box-description ">Չկա ավելի թանկ բան, քան մարդկային կյանքը: Մենք հավատում ենք, որ  յուրաքանչյուր մարդ, այդ թվում նրանք, ում մենք ծառայում ենք, ունի արժանապատվություն և եզակի է իր տեսակի մեջ։</div>
                    </div>
                </div>

                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/we-are-stewards.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք արձագանքող ենք</span>

                        <div class="about-box-description">Մենք այնտեղ ենք, որտեղ կա մեր կարիքը. մենք տրամադրում ենք անհապաղ օգնություն և օգնում ենք վերսկսել կյանքը։ </div>
                    </div>
                </div>

                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/committed-to-the-poor.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք ծառայում ենք աղքատներին</span>

                        <div class="about-box-description">Մեր ծրագրերի կենտրոնում առավել խոցելի երեխաներն են, որոնց մենք աջակցում ենք հաղթահարել աղքատությունը և վայելել կյանքն իր լիարժեքությամբ:</div>
                    </div>
                </div>

                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/partners.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք գործընկերներ ենք</span>

                        <div class="about-box-description">Մենք ուժեղ են միասին, ուստի եկեք միավորենք ուժերը` կյանքն ավելի լավը դարձնելու համար:</div>
                    </div>
                </div>

                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/responsive.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք խնամքով ենք վերաբերվում մեր գործին</span>

                        <div class="about-box-description">Հաշվետու լինելով և ռեսուրսները ճիշտ օգտագործելով` մենք ստեղծում ենք ավելի լավ ապագայի հնարավորություններ:</div>
                    </div>
                </div>

                <div class="col-lg-4 p-2 p-lg-3">
                    <div class="about-box d-flex flex-column h-100">
                        <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/christian.png') }}" alt="" title="">
                        </div>

                        <span class="about-box-title">Մենք քրիստոնյա ենք</span>

                        <div class="about-box-description">Մենք աջակցում ենք ԲՈԼՈՐ երեխաներին` առաջնորդվելով քրիստոնեական արժեքներով։ </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-event my-margin">
        <div class="container-small">
            <div class="swiper-container events-swiper-container d-flex justify-content-center">
                <div class="swiper-wrapper">
                    <div class="swiper-slide events-swiper-slide-box">
                        <div class="row">
                            <div class="col-12 col-lg-6 event-picture">
                                <img class="w-100" src="{{ asset('images/santa.png')  }}" alt="" title="">
                            </div>

                            <div class="col-12 col-lg-6 d-flex flex-column event-details">
                                <span class="event-name">''Secret Santa'' campaign is officially launched!</span>

                                <span class="event-date">03.12.2020</span>

                                <span class="event-title">Give a gift. Make a change!</span>

                                <div class="event-description">
                                    It is already the fourth year, World Vision Armenia has been organising Secret Santa charity campaign to raise funds from individuals and companies for Christmas presents for the most vulnerable children of Armenia.

                                    With due consideration of the current situation in Armenia related to the Nagorno-Karabakh conflict and COVID-19 pandemic, this year we aim to not only reach children from needy families residing in Armenia...
                                </div>



                                <div class="progressbar-wrap">
                                    @include('site.components.progressbar')
                                </div>

                                <a href="#" class="button-orange text-decoration-none">Give Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide events-swiper-slide-box">
                        <div class="row">
                            <div class="col-6 event-picture">
                                <img class="w-100" src="{{ asset('images/santa.png')  }}" alt="" title="">
                            </div>

                            <div class="col-6 d-flex flex-column event-details">
                                <span class="event-name">''Secret Santa'' campaign is officially launched!</span>

                                <span class="event-date">03.12.2020</span>

                                <span class="event-title">Give a gift. Make a change!</span>


                                <div class="event-description">
                                    It is already the fourth year, World Vision Armenia has been organising Secret Santa charity campaign to raise funds from individuals and companies for Christmas presents for the most vulnerable children of Armenia.

                                    With due consideration of the current situation in Armenia related to the Nagorno-Karabakh conflict and COVID-19 pandemic, this year we aim to not only reach children from needy families residing in Armenia...
                                </div>

                                <div class="progressbar-wrap">
                                    @include('site.components.progressbar')

                                    <div class="myProgress">
                                        <div class="myBar"></div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="progress-bottom-text">goal</div>
                                        <div class="progress-bottom-text data-max=">30000$</div>
                                    </div>
                                </div>

                                <a href="#" class="button-orange text-decoration-none">Give Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-swiper-buttons">
                <div class="swiper-button-prev events-swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(0 11) rotate(-90)">
                            <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"/>
                        </g>
                    </svg>
                </div>

                <div class="swiper-button-next events-swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(-97.141 11.001) rotate(-90)">
                            <path d="M5.5,103.141a.786.786,0,0,1-.545-.216L.226,98.4a.715.715,0,0,1,0-1.042.8.8,0,0,1,1.089,0l4.185,4,4.185-4a.8.8,0,0,1,1.089,0,.715.715,0,0,1,0,1.042l-4.73,4.526A.786.786,0,0,1,5.5,103.141Z" transform="translate(0 0)" fill="#0a0a0a"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="light-orange-block my-margin">
        <div class="background-absolute">
            <img class="w-100 d-none d-lg-block" src="{{ asset ('images/orange-pic.png') }}">
            <img class="img-fluid d-lg-none" src="{{ asset ('images/orange-pic2.png') }}">
{{--            <img class="img-fluid" src="{{ asset('images/sponsor-a-child.png')  }}" alt="" title="">--}}
        </div>
        <div class="container-small position-relative">
            <div class="light-orange-flexbox d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column">
                    <span class="light-orange-title">Մեր ազդեցությունը</span>

                    <div class="light-orange-description">
                        Առանց ձեր օգնության մեր հնարավորությունները սահմանակ են. օգնեք մեզ հասնել ավելի մեծ ձեռքբերումների ու փոխել ավելի մեծ թվով երեխաների կյանքը։
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="light-orange-group d-flex align-items-center light-orange-group-1">
                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">650 000</span>
                            <span class="orange-property-name">երեխա</span>
                        </div>

                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">32</span>
                            <span class="orange-property-name">տարի</span>
                        </div>
                    </div>

                    <div class="light-orange-group d-flex align-items-center light-orange-group-2">
                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">41 000</span>
                            <span class="orange-property-name">նվիրատու</span>
                        </div>

                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">70</span>
                            <span class="orange-property-name">ինժեներական լաբորատորիաներ</span>
                        </div>
                    </div>

                    <div class="light-orange-group d-flex align-items-center light-orange-group-3">
                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">200</span>
                            <span class="orange-property-name">համայնքներ</span>
                        </div>

                        <div class="light-orange-group-box d-flex justify-content-center align-items-center flex-column">
                            <span class="orange-property">4000</span>
                            <span class="orange-property-name">ծայրահեղ աղքատ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="how-to-help my-margin">
        <div class="container-small">
            <span class="title-usual">Ինչպե՞ս օգնել</span>
            <div class="mb-0 description-usual">Ընտրեք կարիքավոր երեխաներին օգնելու Ձեր տարբերակը:</div>

            @include('site.components.donate-block')

        </div>
    </div>

    <div class="pictures-block my-margin">
        <div class="container-small">
            <span class="title-usual">Լսիր նրանց ձայնը...</span>
            <div class="mb-0 description-usual">Մեր նվիրատուների շնորհիվ այս երեխաների կյանքը փոխվել է. ծանոթացեք նրանց պատմություններին: </div>
        </div>

        <div class="pictures-home">
            <div class="mx-0 row">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo1.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo2.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo3.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo4.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo5.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo6.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo7.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo8.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo9.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo10.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo11.jpg')  }}" alt="" title="">
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-0">
                    <img class="img-fluid filter-image" src="{{ asset('images/photo12.jpg')  }}" alt="" title="">
                </div>
            </div>
        </div>

        <div class="view-all">Տեսնել ավելին</div>
    </div>

    <div class="how-does-work my-margin">
        <div class="container-small">
            <span class="title-usual">Ինչպես է հովանավորությունն աշխատում</span>

            <div class="how-does-work-boxes">
                <div class="row">
                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                Դուք կտեսնեք` ինչպես է Ձեր նվիրատվության շնորհիվ փոխվում երեխայի կյանքը:
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                Ձեզ հետ մտերմությունը կուրախացնի ու կքաջալերի երեխային` հասնելու իր անիրական թվացող երազանքներին:
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 work-box-wrap">
                        <div class="how-does-work-box d-flex flex-column">
                            <div class="how-does-work-image-wrap">
                                <img class="img-fluid" src="{{ asset('images/how-does-work-image.png')  }}" alt="" title="">
                            </div>

                            <div class="how-does-work-boxes-description">
                                Օգնելով երեխային` Դուք կօգնեք նաև նրա ընտանիքին և համայնքին. ծրագիրը ներառում է համապարփակ աջակցություն:
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="information-orange-block my-margin position-relative">
        <div class="background-absolute">
            <img class="w-100 d-none d-lg-block" src="{{ asset('images/light-orange-2.png')}}">
            <img class="img-fluid d-lg-none" src="{{ asset('images/light-orange-3.png')}}">
        </div>

        <div class="container-small position-relative">
            <div class="light-orange-flexbox d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column orange-content">
                    <span class="light-orange-title">32 տարի Հայաստանում</span>

                    <div class="light-orange-description">
                        Ինչպես է Վորլդ Վիժն Հայաստանը փոխել երեխաների կյանքը վերջին 32 տարիների ընթացքում:
                    </div>

                    <a href="#" class=" button-orange text-decoration-none">
                        Դիտել տեսանյութը
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path d="M133.4,118.771l-11.472,5.81a1.814,1.814,0,0,1-1.731-.053,1.7,1.7,0,0,1-.85-1.462V111.483a1.7,1.7,0,0,1,.848-1.461,1.813,1.813,0,0,1,1.729-.056l11.472,5.772a1.685,1.685,0,0,1,0,3.032Z" transform="translate(-119.351 -109.774)" fill="#fff"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="partners my-margin">
        <div class="container-small">
            <span class="title-usual">Կորպորատիվ նվիրատուներ և հիմնադրամներ</span>
            <div class="mb-0 description-usual partners-description">
                Վերջին 4 տարվա ընթացքում բազմաթիվ կազմակերպություններ դարձել են Վորլդ Վիժն Հայաստանի գործընկերը՝ օգնելով բարեփոխել բազմաթիվ երեխաների և նրանց ընտանիքների կյանքը և դրսևորելով սոցիալական պատասխանատվության բարձր արժեքները:
            </div>

            <div class="partners-swiper-wrapper d-flex align-items-center">
                <button class="swiper-button-prev partners-swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(0 11) rotate(-90)">
                            <path d="M5.5,0a.786.786,0,0,0-.545.216L.226,4.742a.715.715,0,0,0,0,1.042.8.8,0,0,0,1.089,0l4.185-4,4.185,4a.8.8,0,0,0,1.089,0,.715.715,0,0,0,0-1.042L6.045.216A.786.786,0,0,0,5.5,0Z" transform="translate(0)" fill="#0a0a0a"/>
                        </g>
                    </svg>
                </button>

                <div class="swiper-container partners-swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/sef-international.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/sef-international.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/ucom.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/p.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/sef-international.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/ucom.png') }}" alt="" title="">
                        </div>

                        <div class="swiper-slide partners-swiper-slide-box d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/p.png') }}" alt="" title="">
                        </div>
                    </div>
                </div>

                <button class="swiper-button-next partners-swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11">
                        <g transform="translate(-97.141 11.001) rotate(-90)">
                            <path d="M5.5,103.141a.786.786,0,0,1-.545-.216L.226,98.4a.715.715,0,0,1,0-1.042.8.8,0,0,1,1.089,0l4.185,4,4.185-4a.8.8,0,0,1,1.089,0,.715.715,0,0,1,0,1.042l-4.73,4.526A.786.786,0,0,1,5.5,103.141Z" transform="translate(0 0)" fill="#0a0a0a"/>
                        </g>
                    </svg>
                </button>

            </div>

            <a class="view-all text-decoration-none">Տեսնել ավելին</a>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
