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
                            <img src="{{asset('u/banners/' . $pageContent['image'])}}" class="w-full"
                                 alt="{{ $pageContent['title'][$locale] }}">
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
            <form action="{{ route('measurement.send_message') }}" class="flex flex-col md:p-4" method="post" enctype="multipart/form-data">
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

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="email">
                                        {{ t('Page form.email') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="email"
                                           name="email"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('email') has-error @enderror"
                                           id="email"
                                           maxlength="200"
                                           value="{{ old('email') }}"
                                           required>
                                    @error('email')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col col w-full md:w-1/2 pl-4">
                        <div class="shadow-over w-full">
                            <div class="w-full p-5">
                                @include('site.pages.static.components.title', ['title' => t('Page static loan.order details')])
                            </div>
                            <div class="w-full flex flex-wrap">
                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="wall_code">
                                        {{ t('Page form.color') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="color"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('color') has-error @enderror"
                                           id="color"
                                           maxlength="200"
                                           value="{{ old('color') }}"
                                           required>
                                    @error('color')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                @if(isset($sizes) && count($sizes->criteria))
                                    <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                        <label class="cursor-pointer text-black"
                                               for="wall_sizes">
                                            {{ t('Page form.wall sizes') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="wall_sizes"
                                                id="wall_sizes"
                                                required
                                                class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('wall_sizes') has-error @enderror">
                                            <option value="" selected></option>
                                            @foreach($sizes->criteria as $size)
                                                <option
                                                    value="{{ $size->id }}"{{ old('wall_sizes') && $size->id == old('wall_sizes') ? 'selected' : '' }}>
                                                    {{ $size->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('wall_sizes')
                                        <small class="form-text text-danger text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="category">
                                        {{ t('Page form.product category') }}
                                    </label>
                                    <input type="text"
                                           name="category"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('category') has-error @enderror"
                                           id="category"
                                           maxlength="200"
                                           value="{{ old('category') }}">
                                    @error('category')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="code">
                                        {{ t('Page form.product code') }}
                                    </label>
                                    <input type="text"
                                           name="code"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('code') has-error @enderror"
                                           id="code"
                                           maxlength="200"
                                           value="{{ old('code') }}">
                                    @error('code')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="length">
                                        {{ t('Page form.length') }}
                                    </label>
                                    <input type="text"
                                           name="length"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('length') has-error @enderror"
                                           id="length"
                                           maxlength="200"
                                           value="{{ old('length') }}">
                                    @error('length')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="width">
                                        {{ t('Page form.width') }}
                                    </label>
                                    <input type="text"
                                           name="width"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('width') has-error @enderror"
                                           id="width"
                                           maxlength="200"
                                           value="{{ old('width') }}">
                                    @error('width')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="desired_size">
                                        {{ t('Page form.desired item size') }}
                                    </label>
                                    <input type="text"
                                           name="desired_size"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('desired_size') has-error @enderror"
                                           id="desired_size"
                                           maxlength="200"
                                           value="{{ old('desired_size') }}">
                                    @error('desired_size')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="xl:w-1/2 lg:w-1/2 w-1/2 p-5">
                                    <label class="cursor-pointer text-black"
                                           for="ceiling_height">
                                        {{ t('Page form.ceiling height') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text"
                                           name="ceiling_height"
                                           class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 p-2 @error('ceiling_height') has-error @enderror"
                                           id="ceiling_height"
                                           maxlength="200"
                                           required
                                           value="{{ old('ceiling_height') }}">
                                    @error('ceiling_height')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-full p-5">
                                    <label class="cursor-pointer text-black"
                                           for="message">{{ t('Page form.message') }}</label>
                                    <textarea name="message"
                                              cols="30"
                                              rows="5"
                                              class="w-full focus:outline-none focus:border-blue border-b border-gray mt-2 resize-none @error('message') has-error @enderror"
                                              id="message"
                                              maxlength="1000"
                                              required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <small class="form-text text-danger text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-full p-5">
                                    <label class="cursor-pointer text-black"
                                           for="file">
                                        {{ t('Page form.file') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <label for="file" class="custom-file-upload shadow-over cursor-pointer text-black px-5 ml-3">
                                        {{ t('Page form.upload') }}
                                    </label>
                                    <input type="file"
                                           name="file"
                                           id="file"
                                           class="custom-file-input"
                                           required
                                           value="{{ old('file') }}">
                                    @error('file')
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
                @component('site.components.gallery', ['gallery' => $gallery])@endcomponent
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/info.js') }}"></script>
@endsection
