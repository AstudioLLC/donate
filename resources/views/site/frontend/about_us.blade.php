@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/about-us.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="container-small about-top">
        <div class="row">
            <div class="col-12 col-lg-6 p-lg-4">
                <div class="about-text-content">
                    <div class="text-orange">"Our vision for every child, Life in all its fullness. Our prayer for every heart, The will to make it so."</div>

                    <h2 class="title-usual">About World Vision</h2>

                    <div class="editor">
                        World Vision is a Christian, child-focused and community-based organization dedicated to working with children, families and communities to overcome poverty and injustice.

                        World Vision started operations in Armenia in 1988 providing emergency aid to people affected by the devastating earthquake. Later, World Vision’s projects have transitioned beyond meeting the demands of crisis situations to promoting spiritual and physical transformation of more than 200 communities in Shirak, Aragatsotn, Gegharkunik, Syunik, Tavush and Lori marzes and the capital Yerevan.
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 p-lg-4 about-picture-right">
                <img class="w-100" src="{{ asset('images/about-us.png') }}" alt="" title="">
            </div>
        </div>
    </div>

    <div class="container-small my-margin about2">
        <div class="row">
            <div class="col-12 col-lg-6 p-lg-3 about-picture-right">
                <img class="w-100" src="{{ asset('images/about-us2.png') }}" alt="" title="">
            </div>

            <div class="col-12 col-lg-6 p-lg-3">
                <div class="about-details d-flex flex-column">

                    <div class="donate-pic-group">
                        <div class="donate-pic">
                            <img class="img-fluid" src="{{ asset('images/donate-pic.png') }}" alt="" title="">
                        </div>

                        <div class="about-number">71,630</div>
                    </div>

                    <div class="about-number-text-orange">Children and youth living in Armenia had direct and indirect benefit from WV Programming</div>

                    <div class="text-black">WVA implements activities through the following three Strategic Objectives:</div>

                    <div class="about-group">

                        <ul class="orange-ul">
                            <li class="orange-li text-default group-box">
                                Early childhood development and growth ensured for all (age group: 0-5)
                            </li>

                            <li class="orange-li text-default group-box">
                                Early childhood development and growth ensured for all (age group: 0-5)
                            </li>

                            <li class="orange-li text-default group-box">
                                Early childhood development and growth ensured for all (age group: 0-5)
                            </li>
                        </ul>

{{--                        <div class="group-box d-flex align-items-center">--}}
{{--                            <div class="about-check">--}}
{{--                                <img class="w-100" src="{{ asset('images/about-check.png') }}" alt="" title="">--}}
{{--                            </div>--}}

{{--                            <span class="text-default">Non-abusive and inclusive families, schools and communities for all children, especially the most vulnerable (age group: 6-14))</span>--}}
{{--                        </div>--}}

{{--                        <div class="group-box d-flex align-items-center">--}}
{{--                            <div class="about-check">--}}
{{--                                <img class="w-100" src="{{ asset('images/about-check.png') }}" alt="" title="">--}}
{{--                            </div>--}}

{{--                            <span class="text-default">Youth driving development and peacebuilding (age group: 15-29)</span>--}}
{{--                        </div>--}}
                    </div>

                    <div class="about-more-information-link">
                        <span class="more-information-text text-default">For more information about our projects visit
                            <a target="_blank" class="link-orange text-decoration-none" href="https://www.wvi.org/armenia">wvi.org/armenia</a>
                        </span>
                    </div>

                    <div class="description-bottom text-default">
                        Do you have a child protection or adult beneficiary concern or any other concern regarding World Vision's work or staff conduct? World Vision is committed to taking action on every safeguarding report we receive. Report your concern confidentially here:
                        <a target="_blank" class="link-orange text-decoration-none" href="http://worldvision.ethicspoint.com">http://worldvision.ethicspoint.com</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-small about-core-values">
        <span class="title-usual">Our Core Values</span>

        <div class="row mx-0 about-boxes">
            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
                <div class="about-box d-flex flex-column h-100">
                    <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">

                        <img src="{{ asset('images/value-people.png') }}" alt="" title="">
                    </div>

                    <span class="about-box-title">Մենք արժևորում ենք մարդկանց</span>

                    <div class="about-box-description ">Չկա ավելի թանկ բան, քան մարդկային կյանքը: Մենք հավատում ենք, որ  յուրաքանչյուր մարդ, այդ թվում նրանք, ում մենք ծառայում ենք, ունի արժանապատվություն և եզակի է իր տեսակի մեջ։</div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
                <div class="about-box d-flex flex-column h-100">
                    <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/we-are-stewards.png') }}" alt="" title="">
                    </div>

                    <span class="about-box-title">Մենք արձագանքող ենք</span>

                    <div class="about-box-description">Մենք այնտեղ ենք, որտեղ կա մեր կարիքը. մենք տրամադրում ենք անհապաղ օգնություն և օգնում ենք վերսկսել կյանքը։ </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
                <div class="about-box d-flex flex-column h-100">
                    <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/committed-to-the-poor.png') }}" alt="" title="">
                    </div>

                    <span class="about-box-title">Մենք ծառայում ենք աղքատներին</span>

                    <div class="about-box-description">Մեր ծրագրերի կենտրոնում առավել խոցելի երեխաներն են, որոնց մենք աջակցում ենք հաղթահարել աղքատությունը և վայելել կյանքն իր լիարժեքությամբ:</div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
                <div class="about-box d-flex flex-column h-100">
                    <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/partners.png') }}" alt="" title="">
                    </div>

                    <span class="about-box-title">Մենք գործընկերներ ենք</span>

                    <div class="about-box-description">Մենք ուժեղ են միասին, ուստի եկեք միավորենք ուժերը` կյանքն ավելի լավը դարձնելու համար:</div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
                <div class="about-box d-flex flex-column h-100">
                    <div class="about-box-icon-wrap d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/responsive.png') }}" alt="" title="">
                    </div>

                    <span class="about-box-title">Մենք խնամքով ենք վերաբերվում մեր գործին</span>

                    <div class="about-box-description">Հաշվետու լինելով և ռեսուրսները ճիշտ օգտագործելով` մենք ստեղծում ենք ավելի լավ ապագայի հնարավորություններ:</div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 p-2 p-lg-3">
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

    <div class="container-small local-fundraising">
        <span class="title-usual">Local Fundraising</span>

        <div class="editor">
            In 2012, World Vision Armenia started its local fundraising activities to increase the share of local funding inputs, raise additional funds and foster the culture of giving in Armenia. We strive to bring local donors alongside most vulnerable children and families, to help answer their most urgent needs.

            We work with corporate donors and individuals offering them a number of ways to contribute to charity and a range of projects to support. With our long-term development initiatives and dedicated staff in 14 offices throughout Armenia, we make sure that your donation is put to good use.
        </div>
    </div>

    <div class="donate-now-wrap my-margin">
        <div class="container-small donate-now-block d-flex justify-content-center align-items-center">
            <span class="donate-now-text">Ցանկացած նվիրատվություն արժեքավոր է</span>
            <button type="button" href="#" class="button-orange">Նվիրաբերել ՀԻՄԱ</button>
        </div>
    </div>
@endsection
