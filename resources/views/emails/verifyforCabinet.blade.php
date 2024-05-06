@extends('site.layouts.app')
@if(auth()->user()->verified == '1')
    <script>
        window.location.href = '/'
    </script>
@else
@section('content')
    <div class="container">
        <div class="row">
            <form action="{!! route('user.logout') !!}" enctype="multipart/form-data" method="post" style="display: flex; justify-content: flex-end;">
                @csrf
                <a href="javascript:void(0)" class="profile-link text-decoration-none d-flex align-items-center" onclick="$(this).parent().submit()">
                        <span class="d-block profile-link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.001" height="20" viewBox="0 0 19.001 20">
                                <path d="M285.446,209.2h-7.521a.594.594,0,0,1,0-1.187h7.521a.594.594,0,0,1,0,1.187Zm0,0" transform="translate(-267.041 -199.856)"/>
                                <path d="M400.6,135.1a.594.594,0,0,1-.42-1.014l2.549-2.549-2.549-2.549a.594.594,0,0,1,.84-.84l2.969,2.969a.594.594,0,0,1,0,.84l-2.969,2.969A.59.59,0,0,1,400.6,135.1Zm0,0" transform="translate(-385.16 -122.821)"/>
                                <path d="M6.333,20.008a1.556,1.556,0,0,1-.491-.078L1.078,18.26A1.678,1.678,0,0,1,0,16.675v-15A1.628,1.628,0,0,1,1.583.008a1.558,1.558,0,0,1,.491.078L6.838,1.756A1.678,1.678,0,0,1,7.916,3.341v15a1.628,1.628,0,0,1-1.583,1.667ZM1.583,1.258a.408.408,0,0,0-.4.417v15a.432.432,0,0,0,.275.4L6.2,18.74a.4.4,0,0,0,.525-.4v-15a.432.432,0,0,0-.275-.4L1.712,1.276a.41.41,0,0,0-.129-.018Zm0,0" transform="translate(0 -0.008)"/>
                                <path d="M37.751,6.341a.594.594,0,0,1-.594-.594V2.185a.991.991,0,0,0-.989-.99H27.262a.594.594,0,0,1,0-1.187h8.906a2.179,2.179,0,0,1,2.177,2.177V5.747A.594.594,0,0,1,37.751,6.341Zm0,0" transform="translate(-25.678 -0.008)"/>
                                <path d="M185.092,283.673h-3.167a.594.594,0,0,1,0-1.187h3.167a.991.991,0,0,0,.989-.99v-3.562a.594.594,0,0,1,1.187,0V281.5A2.179,2.179,0,0,1,185.092,283.673Zm0,0" transform="translate(-174.603 -266.048)"/>
                            </svg>
                        </span>
                    <span>{{ __('frontend.cabinet.Log out') }}</span>
                </a>
            </form>
            <div class="col-md-12" >
                <div class=" justify-content-center align-items-center thank-you" id="myModal">
                    <div class="donate-modal-white donate-modal-white-thank-you d-flex align-items-center position-relative">
                        <div class="modal-image">
                            <img class="w-100" src="{{ asset('images/thank-you.png') }}" alt="" title="">
                        </div>
                        <div class="donate-modal-content d-flex flex-column align-items-center thank-you-modal-content">
                            <h2 class="title-usual">{{__('frontend.Payment.Thank you')}}</h2>
                            <span class="description-usual">
                             {{ __('frontend.Email verification are send') }}  {{auth()->user()->email ?? ''}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@endif
