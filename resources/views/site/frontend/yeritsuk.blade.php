@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/yeritsuk.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/Yeritsuk.png') }}" alt="" title="">

            <img class="img-fluid d-md-none" src="{{ asset('images/Yeritsuk2.png') }}" alt="" title="">


            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Yeritsuk Sponsorship Program</span>

                    <span class="text-default white-block-description">Only 265 drams a day will help to change a child's life. And your friendship will give them hope, joy and encouragement.</span>

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Make a payment</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin background-page-content">

        <div class="video-wrap">
            <iframe src="https://www.youtube.com/embed/POhU8iLLsuQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <span class="title-usual">Caring for a vulnerable child</span>

        <div class="page-witch-background-editor text-default">
            Ծրագրի նպատակն է աջակցել առավել դժվար իրավիճակում գտնվող ընտանիքներին, որպեսզի նրանք կարողանան հաղթահարել աղքատության շեմը և դուրս գալ դժվար իրավիճակից: Ընտանիքներն ընտրվում են խոցելիության չափորոշիչներով և ընթացքում մոնիտորինգ են անցնում՝ առաջընթացը գնահատելու նպատակով:
            Հովանավորության ծրագիրն անհատ հովանավորների համար ունի հովանավորության երկու տեսակ.

            1. Առավել խոցելի երեխայի հովանավորություն - ամենամսյա փոքր նվիրատվությամբ Դուք կարող եք նպաստել ընտանիքի տնտեսական զարգացմանը և դրական փոփոխությունները բերել երեխայի կյանքում: Ծրագրի նպատակն է աջակցել առավել դժվար իրավիճակում գտնվող ընտանիքներին, որպեսզի նրանք կարողանան հաղթահարել աղքատության շեմը և դուրս գալ չքավորության կարգավիճակից: Ընտանիքներն ընտրվում են խոցելիության չափորոշիչներով և ընթացքում մոնիտորինգ են անցնում՝ առաջընթացը գնահատելու նպատակով:

            2. Լինենք հոգատար երեխայի հանդեպ - հովանավորության այս տեսակով Ձեր կողմից աջակցություն ստացող երեխան կայցելի  արտադպրոցական խմբակ կանցնի զարգացման փուլերի միջոցով, որի արդյունքում երեխան կստանա իր տարիքին համապատասխան չափելի գիտելիքներ և հմտություններ:

            Այս մոտեցման յուրահատկություններից այն է, որ օգնելով երեխային, օգնում ենք ընտանիքին և համայնքին:  Եվ սա արվում է մինիմալ գումարներ Read More
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
