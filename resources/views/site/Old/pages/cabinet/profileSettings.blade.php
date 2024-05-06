@extends('site.layouts.app')

@section('content')
    <div class="container">
        <div class="sm:flex hidden">
            @include('site.components.breadcrumb')
        </div>
        <div class="w-full flex xl:flex-row flex-col">
            <div class="w-full xl:w-1/5 mb-3 sm:mb-8 flex bottom-0 left-0 bg-white">
                <div class="mobile-cabinet sm:flex hidden">
                    @include('site.pages.cabinet.components.cabinet')
                </div>
                <div class="xl:hidden p-2 flex items-center">
                    <a href="">
                        <i class="fa fa-arrow-left" aria-expanded="true"></i>
                    </a>
                    <img class="p-2" src="{{ asset('images/user.svg') }}" alt="">
                    <h1 class="p-2">Անձնական տվյալներ</h1>
                </div>
            </div>
            <form action="{{ route('cabinet.profile.updateUserInfo') }}" method="post">
                @csrf
                <div class="w-full flex flex-wrap">
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="name">
                            Ա․Ա․Հ․
                            <sup class="text-red">*</sup>
                        </lable>
                        <input type="text"
                               id="name"
                               name="name"
                               class="bg-gray-light p-3 w-full rounded focus:bg-white focus:outline-none focus:shadow"
                               value="{{ old('name') ?? $user->name }}">
                        @if($errors->has('name'))
                            <span class="input-alert">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="name">
                            Հեռախոսահամար
                            <sup class="text-red">*</sup>
                        </lable>
                        <input type="text"
                               id="phone"
                               name="phone"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow masked-phone-inputs"
                               value="{{ $user->formattedPhone }}">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="email">
                            Էլ․ հասցե
                            <sup class="text-red">*</sup>
                        </lable>
                        <u>{{ $user->email }}</u>
                        <button class="bg-blue text-white p-3 rounded" type="button" data-toggle="modal" data-target="#emailChangingModal">
                            Сменить
                        </button>
                        {{--<input type="email"
                               id="email"
                               name="email"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow"
                               value="k.martirosyan@yahoo.com">--}}
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-2/3 flex flex-col mr-0 lg:mr-2 p-2">
                        <lable for="address">
                            Հասցե
                            <sup class="text-red">*</sup>
                        </lable>
                        <input type="text"
                               id="address"
                               name="address"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow"
                               value="{{ old('address') ?? $user->address }}">
                        @if($errors->has('address'))
                            <span class="input-alert">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="password">Հին գաղտնաբառ <sup class="text-red">*</sup></lable>
                        <input type="password"
                               id="current_password"
                               name="current_password"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow"
                               value="">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="new_pass">Նոր գաղտնաբառ <sup class="text-red">*</sup></lable>
                        <input type="text"
                               id="password"
                               name="password"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow"
                               value="">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col p-2">
                        <lable for="repeat_pass">Կրկնել գաղտնաբառը <sup class="text-red">*</sup></lable>
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               class="bg-gray-light p-3 w-full focus:bg-white focus:outline-none focus:shadow"
                               value="">
                    </div>
                    <div class="w-full flex justify-end">
                        <div class="w-full md:w-1/2 lg:w-1/5 flex flex-col p-2">
                            <button class="bg-blue text-white p-3 rounded" type="submit">
                                Պահպանել
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{--@include('site.pages.cabinet.components.emailChangingModal')--}}
    </div>
@endsection

@section('js')
    {{--<script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>--}}
    <script src="{{ asset('assets/jquery/jquery.inputmask.js') }}"></script>
    <script>
        window.phoneChangingCodeUrl = '{{--{{ route('cabinet.phoneVerification.sendPhoneChangingCode') }}--}}';
        window.phoneChangingUrl = '{{--{{ route('cabinet.phoneVerification.change') }}--}}';
        window.emailChangingCodeUrl = '{{--{{ route('cabinet.emailVerification.sendEmailChangingCode') }}--}}';
        window.emailChangingUrl = '{{--{{ route('cabinet.emailVerification.change') }}--}}';
    </script>
    {{--<script src="{{ asset('js/personal-info.js') }}"></script>--}}
@endsection
