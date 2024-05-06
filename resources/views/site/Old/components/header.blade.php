<header>
    <div class="header-upper sm:block hidden bg-white">
        <div class="container">
            <div id="top-bar-section" class="flex flex-wrap">
                @php($topPages = $pages->where('to_top', true)->values())
                @if(count($topPages))
                    <ul id="top-bar" class="sm:w-85/10 sm:flex items-center justify-end overflow-x-auto">
                        @foreach($topPages as $page)
                            <li>
                                <a class="block p-2 text-sm sm:text-xs hover:text-blue transition whitespace-no-wrap duration-200"
                                   href="{{ route('page', ['url' => $page->static == $homepage->static ? null : $page->url]) }}">
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="w-15/10 flex justify-end">
                    <div class="bg-black">
                        <div class="block px-3 py-2 text-xs text-white whitespace-no-wrap font-semibold">
                            <div class="modal-login cursor-pointer inline-block">{{ t('Page header.login') }}</div>
                            <span class="inline-block text-sm">/</span>
                            <a href="" class="inline-block">{{--{{ settings('header.Блог о здоровье')}}--}}{{ t('Page header.register') }}</a>
                        </div>
                    </div>

                    <div class="p-1 flex justify-center items-center bg-gray ">
                        <div class="relative inline-block text-left">
                            <button type="button"
                                    class="flex justify-center items-center cursor-pointer w-full text-sm leading-5 font-medium focus:outline-none active:bg-gray-50"
                                    id="options-menu"
                                    aria-haspopup="true"
                                    aria-expanded="true">
                                @foreach($languages as $lang)
                                    @if(app()->getLocale() == $lang->iso)
                                        @if ($lang->iso =='hy')
                                            Հայ
                                        @elseif($lang->iso =='ru')
                                            Рус
                                        @else
                                            Eng
                                        @endif
                                    @endif
                                @endforeach
                                <i class="fa fa-caret-down ml-2"></i>
                            </button>
                            <div id="lang-bar" class="origin-top-right hidden absolute z-20 right-0 mt-2 w-12 rounded-md shadow-sm">
                                <div class="rounded-md bg-white shadow-sm">
                                    @foreach($languages as $lang)
                                        @if(app()->getLocale() !== $lang->iso)
                                            <a href="{{ url(\LanguageManager::getUrlWithLocale($lang->iso)) }}"
                                               class="block px-4 py-2 text-sm leading-5 hover:bg-gray hover:bg-gray focus:outline-none">
                                                @if ($lang->iso =='hy')
                                                    Հայ
                                                @elseif($lang->iso =='ru')
                                                    Рус
                                                @else
                                                    Eng
                                                @endif
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="flex py-2 items-center xl:justify-between sm:justify-center justify-between">
            <div class="w-auto flex justify-between">
                <div class="w-auto">
                    <a href="{{ url('/') }}">
                        <img class="image" src="{{ asset('images/logo.png') }}" alt="{{ $seo['title'] ?? $title ?? '' }}">
                    </a>
                </div>
                <div class="ml-4 w-auto items-center sm:flex hidden">
                    <div class="relative">
                        <i class="fa fa-caret-left absolute text-xl text-black-lighter top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
                        <div class="w-10 h-10 bg-black-lighter flex rounded items-center justify-center">
                            <img src="{{ asset('images/phone-icon.svg') }}" alt="{{ $infos->contacts[0]->phone }}">
                        </div>
                    </div>
                    <div class="flex flex-col ml-3">
                        <a href="tel:{{ $infos->contacts[0]->phone }}"
                           class="block text-black-lighter text-lg  text-xs font-bold">
                            {{ $infos->contacts[0]->phone }}
                        </a>
                        <span class="block font-thin text-xs text-gray-dark">{{ t('Page header.call us') }}</span>
                    </div>
                </div>
                <div class="ml-4 w-auto sm:flex hidden items-center">
                    <div class="relative">
                        <i class="fa fa-caret-left absolute text-xl text-black-lighter top-50 translate-rotate-50 right--7" aria-hidden="true"></i>
                        <div class="w-10 h-10 bg-black-lighter flex rounded items-center justify-center">
                            <img src="{{ asset('images/map-icon.svg') }}" alt="{{ $infos->contacts[0]->address }}">
                        </div>
                    </div>
                    <div class="flex flex-col ml-3">
                        <span class="block text-black-lighter text-lg font-bold">
                            {{ $infos->contacts[0]->address }}
                        </span>
                        <span class="block font-thin text-xs text-gray-dark">{{ t('Page header.our address') }}</span>
                    </div>
                </div>
            </div>
            <div class="flex sm:hidden w-auto">
                <div class="ml-4 rounded-full h-10 w-10 shadow flex items-center justify-center">
                    <a href="javascript:void(0)" class="block text-blue-dark text-xs">
                        <img src="{{ asset('images/loupe.svg') }}" alt="">
                    </a>
                </div>
                <div class="ml-4 rounded-full h-10 w-10 shadow flex items-center justify-center">
                    <a href="tel:{{ $infos->contacts[0]->phone }}" class="block text-blue-dark text-xs">
                        <img src="{{ asset('images/phone.svg') }}" alt="{{ $infos->contacts[0]->phone }}">
                    </a>
                </div>
                <div class="ml-4 nav-top-menu rounded-full h-10 w-10 shadow flex items-center justify-center">
                    <div class="block text-blue-dark text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 21 18">
                            <g id="Group_6466" data-name="Group 6466" transform="translate(-332 -31)">
                                <g id="Group_6229" data-name="Group 6229" transform="translate(332.268 31.229)">
                                    <circle id="Ellipse_563" data-name="Ellipse 563" cx="1.5" cy="1.5" r="1.5"
                                            transform="translate(-0.268 -0.229)" fill="#00345b"/>
                                    <rect id="Rectangle_2092" data-name="Rectangle 2092" width="15" height="3" rx="1.5"
                                          transform="translate(5.732 -0.229)" fill="#00345b"/>
                                </g>
                                <g id="Group_6230" data-name="Group 6230" transform="translate(332.268 38.633)">
                                    <circle id="Ellipse_563-2" data-name="Ellipse 563" cx="1.5" cy="1.5" r="1.5"
                                            transform="translate(-0.268 0.367)" fill="#00345b"/>
                                    <rect id="Rectangle_2092-2" data-name="Rectangle 2092" width="15" height="3"
                                          rx="1.5" transform="translate(5.732 0.367)" fill="#00345b"/>
                                </g>
                                <g id="Group_6231" data-name="Group 6231" transform="translate(332.268 46.037)">
                                    <circle id="Ellipse_563-3" data-name="Ellipse 563" cx="1.5" cy="1.5" r="1.5"
                                            transform="translate(-0.268 -0.037)" fill="#00345b"/>
                                    <rect id="Rectangle_2092-3" data-name="Rectangle 2092" width="15" height="3"
                                          rx="1.5" transform="translate(5.732 -0.037)" fill="#00345b"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-auto justify-between xl:flex hidden">
                @include('site.components.search')
            </div>
        </div>
    </div>
    <div class="relative">
        <div class="header-middle bg-gray sm:h-auto h-1">
            <div class="container">
                <div class="flex flex-no-wrap gap-2">
                    <div id="middle-types" class="cursor-pointer sm:block hidden flex justify-start">
                        <div class="bg-pink-custom w-full text-lg h-full flex justify-around items-center px-3 py-2 text-sm text-white">
                            <i class="fa fa-bars text-xl" aria-expanded="true"></i>
                            <p class="px-2">{{ t('Page header.catalog') }}</p>
                        </div>
                    </div>
                    @php($headerPages = $pages->where('to_menu', true)->values())
                    @if(count($headerPages))
                        <ul class="w-1/12 lg:w-10/12 py-0 lg:py-3 z-30 sm:order-last menubar flex items-center">
                            @foreach($headerPages as $page)
                                <li class="sidenav-block">
                                    <a class="block p-2 text-base font-medium hover:text-pink-custom transition duration-200 text-black"
                                       href="{{ route('page', ['url' => $page->static == $homepage->static ? null : $page->url]) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                            <li class="sidenav-none hidden">
                                <div class="block p-2 text-xs sm:block hidden hover:text-yellow-custom cursor-pointer transition duration-200 navs-bar text-white">
                                    <div class="nav-button">
                                        <div class="toggle-wrap">
                                            <span class="toggle-bar"></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="menu_closed hidden xl:h-auto h-screen">
                                </ul>
                            </li>
                        </ul>
                    @endif
                    <div class="w-auto sm:p-1 lg:py-2 lg:ml-4 items-center justify-between xl:hidden sm:flex hidden">
                        @include('site.components.search')
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom bg-blue-light fixed z-50 bottom-0 sm:hidden block w-full">
            <div class="flex justify-around flex-no-wrap gap-2">
                <div id="types" class="flex pt-2 pb-1 w-1/4 cursor-pointer flex-col items-center justify-center">
                    <img class="image h-4 mt-2 mb-3" src="{{ asset('images/nav-white.svg') }}" alt="{{ t('Page header.catalog') }}">
                    <span class="text-white hide-text text-xss">{{ t('Page header.catalog') }}</span>
                </div>
                <div class="flex flex-col pt-2 pb-1 w-1/4 items-center justify-center">
                    <img class="image h-6 mb-3" src="{{ asset('images/cart.svg') }}" alt="{{ t('Page header.basket') }}">
                    <span class="text-white hide-text text-xss">{{ t('Page header.basket') }}</span>
                </div>
                <div class="flex flex-col pt-2 pb-1 w-1/4 items-center justify-center">
                    <img class="image h-6 mb-3" src="{{ asset('images/favorite.svg') }}" alt="{{ t('Page header.favorite') }}">
                    <span class="text-white hide-text text-xss">{{ t('Page header.favorite') }}</span>
                </div>
                <div class="flex flex-col pt-2 pb-1 w-1/4 items-center justify-center" id="cabinetHome">
                    <img class="image h-6 mb-3" src="{{ asset('images/account.svg') }}" alt="{{ t('Page header.cabinet') }}">
                    <span class="text-white hide-text text-xss">{{ t('Page header.cabinet') }}</span>
                </div>
                <div class="w-auto sm:py-2  ml-4 justify-between xl:hidden sm:flex hidden">
                    @include('site.components.search')
                </div>
            </div>
        </div>
        <div class="container relative">
            <div id="menu-type" class="xl:w-full lg:w-2/4 w-full bg-white m-0 shadow xl:my-3 xl:h-500px h-screen left-0 xl:left-none overflow-y-scroll absolute z-20 navigation-bar hidden">
                <div class="flex flex-wrap mb-64 xl:mb-0 lg:m-6">
                    @foreach($categories as $category)
                        @if(count($category->items) > 0 || count($category->children) > 0)
                            <div class="w-full xl:w-1/4 p-2">
                                <p class="mb-3 font-bold text-lg text-black-lighter menu-title">
                                    @if(count($category->items) > 0)
                                        <a href="{{ route('products.list', ['category' => $category->alias]) }}"
                                           class="flex w-full">
                                            <span class="child-name">{{ $category->name }}</span>
                                            <span class="pl-2">({{ count($category->items) }})</span>
                                        </a>
                                    @else
                                        {{ $category->name }}
                                    @endif
                                </p>
                                <div class="w-1/6 mb-2 bg-gray-custom h-1"></div>
                                @if(count($category->children) > 0)
                                    <ul class="pt-2">
                                        @php($row1 = 1)
                                        @foreach($category->children as $child)
                                            @if($child->items_count > 0)
                                                @if($row1 < 5)
                                                    <li class="p-2">
                                                        <a href="{{ route('products.list', ['category' => $child->alias]) }}"
                                                           class="flex w-full">
                                                            <span class="child-name">{{ $child->name }}</span>
                                                            <span class="pl-2">({{ $child->items_count }})</span>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="p-2">
                                                        <a href="{{ route('products.list', ['category' => $child->alias]) }}"
                                                           class="flex w-full text-blue underline">
                                                            {{ t('Page header.catalog see all') }}
                                                        </a>
                                                    </li>
                                                    @break
                                                @endif
                                                @php($row1++)
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal-log opacity-0 z--10 hidden fixed w-full h-full top-auto bottom-0 md:bottom-auto md:top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay-login absolute z-10 w-full h-full bg-black opacity-50"></div>
    <div class="modal-container w-full md:w-2/5 mx-auto pointer-events-auto shadow-lg z-50 overflow-y-auto">
        <div class="modal-content text-left">
            <div class="flex xl:flex-row flex-col xl:items-stretch items-center justify-center">
                <div class="w-2/5 md:flex hidden xl:h-auto h-10 text-white items-center justify-center bg-pink-custom">
                    {{ t('Page header.login text') }}
                </div>
                <div class="content-login xl:p-0 p-5 rounded-b-none rounded-md bg-white w-full xl:w-3/5">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-blue p-3 text-xl">{{ t('Page header.login') }}</p>
                        <div class="w-1/4">
                            <img class="image" src="{{ asset('images/logo.png') }}" alt="{{ t('Page header.login') }}">
                        </div>
                    </div>
                    <div class="content-height p-3">
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf
                            <div class="my-5">
                                <input name="email"
                                       type="email"
                                       required
                                       class="appearance-none rounded-none border-b border-gray relative block w-full px-3 py-2 border-b-1 border-gray placeholder-gray-500 focus:outline-none sm:text-sm sm:leading-5"
                                       placeholder="{{ t('Page login.email') }}" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="input-alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="my-5  flex border-b border-gray">
                                <input name="password"
                                       type="password"
                                       required
                                       class="appearance-none rounded-none relative block w-full px-3 py-2 border-b-1 border-gray placeholder-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                       placeholder="{{ t('Page login.password') }}">
                                <div class="typeChange cursor-pointer focus:outline-none">
                                    <i class="fa fa-eye text-gray cursor-pointer"></i>
                                    <i class="fa fa-eye-slash hidden text-gray cursor-pointer"></i>
                                </div>
                                @if($errors->has('password'))
                                    <span class="input-alert">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            @if($errors->has('global'))
                                <p class="text-center input-alert mt-3">
                                    {{ $errors->first('global') }}
                                </p>
                            @endif
                            <div class="mt-6 w-full text-center flex justify-center">
                                <button type="submit" class="group relative w-full sm:w-1/2 flex justify-center items-center py-2 px-4 bg-blue text-white focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.654" height="12.654"
                                         viewBox="0 0 12.654 12.654">
                                        <g id="Group_6613" data-name="Group 6613" transform="translate(-1196 -569.974)">
                                            <path id="Path_11219" data-name="Path 11219"
                                                  d="M177.955.008c-.013,0-.024-.008-.038-.008H172.25a1.584,1.584,0,0,0-1.582,1.582v.527a.527.527,0,1,0,1.054,0V1.582a.528.528,0,0,1,.527-.527h2.456l-.161.054a1.06,1.06,0,0,0-.714,1v7.909H172.25a.528.528,0,0,1-.527-.527V8.436a.527.527,0,1,0-1.054,0V9.491a1.584,1.584,0,0,0,1.582,1.582h1.582V11.6a1.056,1.056,0,0,0,1.054,1.055,1.106,1.106,0,0,0,.336-.052l3.168-1.056a1.06,1.06,0,0,0,.714-1V1.055A1.056,1.056,0,0,0,177.955.008Zm0,0"
                                                  transform="translate(1029.55 569.974)" fill="#fcfbfb"/>
                                            <path id="Path_11220" data-name="Path 11220"
                                                  d="M5.645,108.926l-2.109-2.109a.527.527,0,0,0-.9.373v1.582H.527a.527.527,0,0,0,0,1.055H2.636v1.582a.527.527,0,0,0,.9.373l2.109-2.109A.527.527,0,0,0,5.645,108.926Zm0,0"
                                                  transform="translate(1196 465.947)" fill="#fcfbfb"/>
                                        </g>
                                    </svg>
                                    <p class="px-2">{{ t('Page header.login') }}</p>
                                </button>
                            </div>
                        </form>
                        {{--<div class="items-center mt-10 flex flex-col justify-center">
                            <p class="connect border-b border-gray-dark w-1/3 text-gray-darker"><span>Կամ</span></p>
                            <div class="flex flex-row">
                                <a href=""
                                   class="cursor-pointer m-1 group bg-pink-custom h-6 xl:h-8 transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-pink-custom items-center justify-around flex hover:bg-blue-700 text-white font-bold p-1 rounded-full">
                                    <div
                                        class="rounded-full xl:h-2 xl:p-3 xl:w-2 h-1 p-2 w-1 text-pink-custom group-hover:text-white group-hover:bg-pink-custom flex items-center justify-center bg-white">
                                        <i class="fab fa-google xl:text-lg text-xs "></i>
                                    </div>
                                    <p class="px-1 xl:px-0 text-xs">Google</p>
                                </a>
                                <a href=""
                                   class="cursor-pointer m-1 group bg-blue-fb h-6 xl:h-8 transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-blue-fb items-center justify-around flex text-white font-bold p-1 rounded-full">
                                    <div
                                        class="rounded-full xl:h-2 xl:p-3 xl:w-2 h-1 p-2 w-1 text-blue-fb group-hover:text-white group-hover:bg-blue-fb flex items-center justify-center bg-white">
                                        <i class="fab fa-facebook-f xl:text-lg text-xs"></i>
                                    </div>
                                    <p class="px-1 xl:px-0 text-xs">Facebook</p>
                                </a>
                                <a href=""
                                   class="cursor-pointer m-1 group h-6 xl:h-8 bg-blue-mail transition ease-in-out duration-700 hover:bg-white hover:shadow hover:text-blue-mail items-center justify-around flex text-white font-bold p-1 rounded-full">
                                    <div
                                        class="rounded-full xl:h-2 xl:p-3 xl:w-2 h-1 p-2 w-1 text-blue-mail group-hover:text-white group-hover:bg-blue-mail flex items-center justify-center bg-white">
                                        <i class="fas fa-at  xl:text-lg text-xs "></i>
                                    </div>
                                    <p class="px-1 xl:px-0 text-xs">Mail.ru</p>
                                </a>
                            </div>
                        </div>--}}
                        <div class="flex mt-8 justify-between items-center">
                            <a href="{{ url('reset') }}" class="text-xs underline">
                                {{ t('Page login.forgot password') }}
                            </a>
                            <a href="{{ url('register') }}" class="cursor-pointer m-1 h-8 bg-yellow-custom transition ease-in-out duration-700 hover:bg-white hover:shadow-over hover:text-yellow-custom items-center justify-around flex text-white font-bold sm:p-1 p-0 rounded-full">
                                <p class="sm:px-4 px-0 text-xs sm:block hidden">{{ t('Page header.register') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="cabinet-home-section relative hidden">
    @include('site.components.cabinet')
</div>--}}
