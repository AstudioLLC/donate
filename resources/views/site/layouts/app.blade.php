<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#F86A04">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title title="World Vision Armenia">{{--{{ $seo['title'] ?? $title ?? '' }}--}}@if(isset($page->title) && $page->title !== 'Home') {{$page->title}} - @endif World Vision Armenia</title>
    @if(!empty($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}">
    @endif
    @if(!empty($seo['description']))
        <meta name="description" content="{{ $seo['description'] }}">
    @endif
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- Meta og  --}}
    <meta property="og:title"              content="World Vision Armenia" />
    <meta property="og:description"        content="Welcome to World Vision Armenia" />
    <meta property="og:image"              content="@if(isset($page) && $page->image && $page->url == request()->segment(count(request()->segments()))) {{$page->getImageUrl('thumbnail')}} @else {{ asset('images/og.jpg') }} @endif"/>
    <meta property="og:image:type" content="image/jpeg" />
    <!--<meta property="og:image:width" content="400" />-->
    <!--<meta property="og:image:height" content="300" />-->
    <meta property="og:type"               content="website" />
    <meta property="og:url"               content="{{url()->current() }}" />
    {{--    CSS    --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('new_styles/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/myselect.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/media.css') }}">--}}


    @yield('meta')
    @yield('css')
    @stack('css')
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1275389173125090');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1275389173125090&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E1ZDL7WMGC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){window.dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-E1ZDL7WMGC');
</script>
<body class="@if(!isset($modal)) overflow-unset @endif">
@include('site.components.header')
<main id="app" class="">
    @yield('content')
</main>
@include('site.components.footer')
<script src="{{ mix('js/app.js') }}"></script>

<script src="{{ asset('js/frontend/jquery.js') }}"></script>
<script src="{{ asset('js/frontend/popper.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap5.js') }}"></script>
<script src="{{ asset('new_styles/js/swiper.min.js') }}"></script>

<script src="{{ asset('js/frontend/main.js') }}"></script>
<script src="{{ asset('js/frontend/myselect.js') }}"></script>
<script src="{{ asset('js/frontend/nav.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>



{{--<script>
    window.customConfig = {
        --}}{{--changeRatingUrl: '{{ route('products.changeRating') }}',--}}{{--
        userAuthenticated : {{ authUser() ? 1 : 0 }},
        userIsAdmin : {{ authUser() && authUser()->isAdmin() ? 1 : 0 }},

        addFavoriteUrl: '{{ route('user.favorite.add') }}',
        removeFavoriteUrl: '{{ route('user.favorite.destroy') }}',
        fetchFavoritesUrl: '{{ route('user.favorite.get') }}',

        fetchProductsUrl : '{{ route('product.getPortion') }}',
        priceRangeUrl : '{{ route('product.getPriceRange') }}',

        changeItemByCollection : '{{ route('product.changeItemByCollection') }}',

        addBasketItemUrl : '{{ route('cabinet.basket.add') }}',
        fetchSmallBasketUrl : '{{ route('cabinet.basket.getSmallBasket') }}',
        fetchBasketItemsUrl : '{{ route('cabinet.basket.get') }}',
        updateBasketItemUrl : '{{ route('cabinet.basket.update') }}',
        removeBasketItemUrl : '{{ route('cabinet.basket.delete') }}',
    };
    var csrf = '{!! csrf_token() !!}';
</script>
<script src="{{ asset('js/favorites-bundle.js') }}"></script>
<script src="{{ asset('js/basket-bundle.js') }}"></script>
<script src="{{ asset('js/basket-calculator.js') }}"></script>
@if(count($notifications = session()->get('notifications', [])))
    <script>1
        @foreach(session()->get('notifications', []) as $notification)
            toastr['{{ $notification['type'] }}']('{{ $notification['text'] }}');
        @endforeach
        @php (session()->forget('notifications')) @endphp
    </script>
@endif--}}
@yield('js')
@stack('js')
</body>
</html>
