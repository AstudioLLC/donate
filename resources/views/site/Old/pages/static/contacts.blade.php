{{--@dd($infos)--}}
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
            <div class="w-full md:p-5">
                <div class="flex flex-wrap w-full">
                    <div class="w-full md:w-1/2 shadow-over border border-gray">
                        <div  class="w-full h-full p-3">
                            @if($infos->data->iframe)
                            <iframe src="{{ $infos->data->iframe }}"
                                    class="w-full h-full"
                                    frameborder="1" allowfullscreen="true"
                                    style="position:relative;">

                            </iframe>
                            @endif
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 md:pl-5 flex flex-col">
                        <div class="p-3 shadow-over border border-gray">
                            @if($infos->contacts)
                                @foreach($infos->contacts as $info)
                                    @if($info->address)
                                        <p class="font-bold text-blue">
                                            {{ $info->address }}
                                        </p>
                                    @endif

                                    @if($info->phone)
                                        <p class="mt-3 font-bold">
                                            {{ t('Page static contacts.tel') }} <a href="tel:{{ $info->phone }}"> {{ $info->phone }}</a>
                                        </p>
                                    @endif

                                    {{--<p class="font-bold">
                                        Ֆաքս.: <a href=""> +374 (10) 26 72 42</a>
                                    </p>--}}
                                    @if($info->email)
                                        <p class="text-gray-dark my-2">
                                            {{ t('Page static contacts.email') }} <a href="mailTo:{{ $info->email }}">{{ $info->email }}</a>
                                        </p>
                                    @endif

                                @endforeach
                            @endif
                        </div>
                        @if($infos->socials)
                            <div class="p-3 my-3">
                                <div class="flex block flex-row">
                                    @foreach($infos->socials as $social)
                                        @if($social->icon)
                                            <a href="{{ $social->url ?? 'javascript:void(0)' }}" class="text-black-lighter mr-2"{{ $social->url ? ' target="_blank"' : '' }}>
                                                <img src="{{ asset('u/banners/' . $social->icon) }}" alt="{{ $social->title ?? null }}" width="25" height="25">
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex my-5 block lg:hidden flex-row">
                                @foreach($infos->socials as $social)
                                    @if($social->icon)
                                        <a href="{{ $social->url ?? 'javascript:void(0)' }}" class="text-black-lighter mr-2"{{ $social->url ? ' target="_blank"' : '' }}>
                                            <img src="{{ asset('u/banners/' . $social->icon) }}" alt="{{ $social->title ?? null }}" width="25" height="25">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <div class="p-3 shadow-over border border-gray">
                            @if($errors->has('global'))
                                <p class="text-danger">{{ $errors->first('global') }}</p>
                            @elseif(session()->has('message_sent'))
                                <p class="text-success">{{ t('Page action notify.message sent') }}</p>
                            @endif
                            <form action="{{ route('contacts.send_message') }}" class="flex flex-col md:p-4" method="post">
                                @csrf
                                <label class="cursor-pointer text-gray-dark" for="name">* {{ t('Page static contacts.form name') }}</label>
                                <input type="text"
                                       name="name"
                                       class="focus:outline-none focus:border-blue border-b border-gray mb-3 @error('name') has-error @enderror"
                                       id="name"
                                       maxlength="200"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <label class="cursor-pointer text-gray-dark" for="email">* {{ t('Page static contacts.form email') }}</label>
                                <input type="email"
                                       name="email"
                                       class="focus:outline-none focus:border-blue border-b border-gray mb-3 @error('email') has-error @enderror"
                                       id="email"
                                       maxlength="200"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <label class="cursor-pointer text-gray-dark" for="phone">{{ t('Page static contacts.form phone') }}</label>
                                <input type="number"
                                       name="phone"
                                       class="focus:outline-none focus:border-blue border-b border-gray mb-3 @error('phone') has-error @enderror"
                                       maxlength="200"
                                       value="{{ old('phone') }}"
                                       id="phone">
                                @error('phone')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <label class="cursor-pointer text-gray-dark" for="theme">* {{ t('Page static contacts.form theme') }}</label>
                                <input type="text"
                                       name="theme"
                                       class="focus:outline-none focus:border-blue border-b border-gray mb-3 @error('theme') has-error @enderror"
                                       id="theme"
                                       maxlength="200"
                                       value="{{ old('theme') }}"
                                       required>
                                @error('theme')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <label class="cursor-pointer text-gray-dark" for="message">{{ t('Page static contacts.form message') }}</label>
                                <textarea name="message"
                                          cols="30"
                                          class="focus:outline-none focus:border-blue border-b border-gray mb-3 @error('message') has-error @enderror"
                                          id="message"
                                          rows="3"
                                          maxlength="1000">{{ old('message') }}</textarea>
                                @error('message')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <p class="text-blue">{{ t('Page form.required inputs') }}</p>
                                <div class="flex justify-end">
                                    <button type="submit"
                                            class="border transition duration-500 ease-in-out bg-white hover:bg-blue hover:text-white mt-4 border-gray h-16 w-full md:w-1/3">
                                        {{ t('Page form.submit') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($gallery))
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
