@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center">
        <div class="w-full">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <section>
        <div class="container">
            <div class="w-full my-5">
                @if(count($pageContent))
                    @if(!empty($pageContent['image']) || !is_null($pageContent['image']))
                        <div class="shadow-over p-4">
                            <img src="{{asset('u/banners/' . $pageContent['image'])}}" class="w-full" alt="{{ $pageContent['title'][$locale] }}">
                        </div>
                    @endif

                    @if($pageContent['title'][$locale] !== null)
                        <h1 class="text-blue font-bold my-3">{{ $pageContent['title'][$locale] }}</h1>
                    @endif

                    @if($pageContent['content'][$locale] !== null)
                        <div class="shadow-over p-5">
                            {!! $pageContent['content'][$locale] !!}
                        </div>
                    @endif

                @endif
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            @if($errors->has('global'))
                <p class="text-danger text-red">{{ $errors->first('global') }}</p>
            @elseif(session()->has('message_sent'))
                <p class="text-success">{{ t('Page action notify.message sent') }}</p>
            @endif
            <form action="{{ route('loan.send_message') }}" class="flex flex-col md:p-4" method="post">
                @csrf
                <input type="hidden" value="{{ $title[app()->getLocale()] }}" name="page">
                <div class="flex my-5">
                    <div class="flex flex-col col w-full md:w-1/2 pr-4">
                        <div class="shadow-over w-full">
                            <div class="w-full p-5">
                                @include('site.pages.static.components.title', ['title' => t('Page static loan.client data')])
                            </div>
                            <div class="w-full flex flex-wrap">
                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="name">
                                        {{ t('Page form.name') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('name') has-error @enderror"
                                           id="name"
                                           maxlength="200"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="surname">
                                        {{ t('Page form.surname') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="surname"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('surname') has-error @enderror"
                                           id="surname"
                                           maxlength="200"
                                           value="{{ old('surname') }}"
                                           required>
                                    @error('surname')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="patronymic">
                                        {{ t('Page form.patronymic') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="patronymic"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('patronymic') has-error @enderror"
                                           id="patronymic"
                                           maxlength="200"
                                           value="{{ old('patronymic') }}"
                                           required>
                                    @error('patronymic')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="address">
                                        {{ t('Page form.address') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="address"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('address') has-error @enderror"
                                           id="address"
                                           maxlength="200"
                                           value="{{ old('address') }}"
                                           required>
                                    @error('address')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="passport">
                                        {{ t('Page form.passport') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="passport"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('passport') has-error @enderror"
                                           id="passport"
                                           maxlength="200"
                                           value="{{ old('passport') }}"
                                           required>
                                    @error('passport')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="social">
                                        {{ t('Page form.social') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="social"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('social') has-error @enderror"
                                           id="social"
                                           maxlength="200"
                                           value="{{ old('social') }}"
                                           required>
                                    @error('social')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="phone">
                                        {{ t('Page form.phone') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="number"
                                           name="phone"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('phone') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('phone') }}"
                                           id="phone"
                                           required>
                                    @error('phone')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="other_phone">
                                        {{ t('Page form.other phone') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="number"
                                           name="other_phone"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('other_phone') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('other_phone') }}"
                                           id="other_phone"
                                           required>
                                    @error('other_phone')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col col w-full md:w-1/2 pl-4">
                        <div class="shadow-over w-full">
                            <div class="w-full p-5">
                                @include('site.pages.static.components.title', ['title' => t('Page static loan.loan rules')])
                            </div>
                            <div class="w-full flex flex-wrap">
                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="total_price">
                                        {{ t('Page form.total price') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="number"
                                           name="total_price"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('total_price') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('total_price') }}"
                                           id="total_price"
                                           required>
                                    @error('total_price')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="loan_amount">
                                        {{ t('Page form.loan amount') }}
                                    </label>
                                    <input type="number"
                                           name="loan_amount"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('loan_amount') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('loan_amount') }}"
                                           id="loan_amount">
                                    @error('loan_amount')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-3">
                                    <label class="cursor-pointer text-black" for="prepayment_percent">
                                        {{ t('Page form.prepayment percent') }}
                                    </label>
                                    <input type="number"
                                           name="prepayment_percent"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('prepayment_percent') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('prepayment_percent') }}"
                                           id="prepayment_percent">
                                    @error('prepayment_percent')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="prepayment_amount">
                                        {{ t('Page form.prepayment amount') }}
                                    </label>
                                    <input type="number"
                                           name="prepayment_amount"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('prepayment_amount') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('prepayment_amount') }}"
                                           id="prepayment_amount">
                                    @error('prepayment_amount')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black" for="loan_term">
                                        {{ t('Page form.loan term') }}
                                    </label>
                                    <input type="number"
                                           name="loan_term"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('loan_term') has-error @enderror"
                                           maxlength="200"
                                           value="{{ old('loan_term') }}"
                                           id="loan_term">
                                    @error('loan_term')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-full p-5">
                                    <div class="flex justify-end">
                                        <button type="submit"
                                                class="border transition duration-500 ease-in-out text-white bg-blue hover:bg-white hover:text-blue mt-4 border-gray h-16 w-full md:w-1/3">
                                            {{ t('Page form.submit') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section>
        <div class="container">
            @if(count($files))
                <div class="flex flex-wrap">
                    @foreach($files as $file)
                        @if($file->name)
                            @component('site.components.file', ['file' => $file])@endcomponent
                        @endif
                    @endforeach
                </div>
            @endif

            @if(count($gallery))
                    <div class="w-full p-5">
                        @include('site.pages.static.components.title', ['title' => t('Page static loan.loan rules'), 'class' => 'mx-auto'])
                    </div>
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/info.js') }}"></script>
@endsection
