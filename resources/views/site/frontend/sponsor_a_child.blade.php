@extends('site.layouts.app')

@push('css')

@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/sponsor-a-child-image.png') }}" alt="" title="">

            <img class="img-fluid d-md-none" src="{{ asset('images/sponsor-a-child-image-2.png') }}" alt="" title="">


            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Sponsor a child</span>

                    <span class="text-default white-block-description">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</span>

                    <span class="donation-amount-text">Donation Amount</span>

                    <div class="amount-amd-text">8000 AMD</div>

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Sponsor</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin background-page-content">
        <span class="title-usual">Հակիրճ բնութագրություն</span>

        <div class="page-witch-background-editor text-default">
            Ծրագրի նպատակն է աջակցել առավել դժվար իրավիճակում գտնվող ընտանիքներին, որպեսզի նրանք կարողանան հաղթահարել աղքատության շեմը և դուրս գալ դժվար իրավիճակից: Ընտանիքներն ընտրվում են խոցելիության չափորոշիչներով և ընթացքում մոնիտորինգ են անցնում՝ առաջընթացը գնահատելու նպատակով:
            Հովանավորության ծրագիրն անհատ հովանավորների համար ունի հովանավորության երկու տեսակ.

            1. Առավել խոցելի երեխայի հովանավորություն - ամենամսյա փոքր նվիրատվությամբ Դուք կարող եք նպաստել ընտանիքի տնտեսական զարգացմանը և դրական փոփոխությունները բերել երեխայի կյանքում: Ծրագրի նպատակն է աջակցել առավել դժվար իրավիճակում գտնվող ընտանիքներին, որպեսզի նրանք կարողանան հաղթահարել աղքատության շեմը և դուրս գալ չքավորության կարգավիճակից: Ընտանիքներն ընտրվում են խոցելիության չափորոշիչներով և ընթացքում մոնիտորինգ են անցնում՝ առաջընթացը գնահատելու նպատակով:

            2. Լինենք հոգատար երեխայի հանդեպ - հովանավորության այս տեսակով Ձեր կողմից աջակցություն ստացող երեխան կայցելի  արտադպրոցական խմբակ կանցնի զարգացման փուլերի միջոցով, որի արդյունքում երեխան կստանա իր տարիքին համապատասխան չափելի գիտելիքներ և հմտություններ:

            Այս մոտեցման յուրահատկություններից այն է, որ օգնելով երեխային, օգնում ենք ընտանիքին և համայնքին:  Եվ սա արվում է մինիմալ գումարներ Read More
        </div>

        <a href="#" class="button-orange sponsor-button text-decoration-none">Sponsor</a>
    </div>
    @include('site.components.frequently-asked-questions')
    @include('site.components.donate_now')
@endsection
