<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#0D1112">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>{{ $seo['title'] ?? $title ?? '' }}</title>
    @if(!empty($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}">
    @endif
    @if(!empty($seo['description']))
        <meta name="description" content="{{ $seo['description'] }}">
    @endif
    <link rel="stylesheet" href="{{ asset('fonts/SegoeUi/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

    @yield('meta')
    @yield('css')
    @stack('css')
</head>
<body>
@include('site.components.header')
<main id="app" class="bg-gray-lighter">
    @yield('content')
</main>
@include('site.components.footer')
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

<script>
    window.customConfig = {
        {{--changeRatingUrl: '{{ route('products.changeRating') }}',--}}
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
    <script>
        @foreach(session()->get('notifications', []) as $notification)
            toastr['{{ $notification['type'] }}']('{{ $notification['text'] }}');
        @endforeach
        @php (session()->forget('notifications')) @endphp
    </script>
@endif
@yield('js')
@stack('js')
</body>
</html>
