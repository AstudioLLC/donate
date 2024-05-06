{{--<!DOCTYPE html>
<html dir="ltr" lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{!! aAdmin('images/favicon.ico') !!}" rel="shortcut icon" type="image/x-icon">
    <title>@yield('title', $title ?? '') - {!! env('CMS_AUTHOR') !!}</title>
    @stack('css')
    @css(aApp('jquery-ui/jquery-ui.css'))
    @css(aApp('font-awesome/css/all.css'))
    @css(aApp('themify-icons/themify-icons.css'))
    @css(aApp('material-design-iconic-font/css/materialdesignicons.min.css'))
    @css(aAdmin('dist/css/init.css'))
    @css(aApp('labelauty/labelauty.css'))
    @css(aApp('toastr/build/toastr.min.css'))
    @css(aAdmin('css/main.css'))
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>


<div id="main-wrapper">
    @include('admin.includes.header')

    <aside class="left-sidebar" data-sidebarbg="skin5">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-10">
                    @include('admin.includes.sidebar')
                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="clearfix">
                <div class="page-breadcrumb-title">
                    <h4 class="page-title">@yield('title', $title ?? '') @yield('titleSuffix')</h4>
                    @if(!empty($back_url))
                        <div class="page-title-back">
                            <a class="text-cyan" href="{{ $back_url }}">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                {{ t('Admin header.Go back') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<script>
    var dir = '{!! url(env('CMS_PREFIX', 'admin')) !!}',
        csrf = '{!! csrf_token() !!}';
</script>
@js(aApp('jquery/jquery.js'))
@js(aApp('jquery-ui/jquery-ui.js'))
@js(aApp('popper.js/popper.js'))
@js(aApp('bootstrap/js/bootstrap.js'))
@js(aApp('perfect-scrollbar/perfect-scrollbar.jquery.min.js'))
@js(aApp('jquery.sparkline/sparkline.js'))
@js(aAdmin('dist/js/waves.js'))
@js(aAdmin('dist/js/sidebarmenu.js'))
@js(aAdmin('dist/js/custom.js'))
@js(aApp('labelauty/labelauty.js'))
@js(aApp('z-select/z-select.js'))
@js(aApp('toastr/build/toastr.min.js'))
{!! App\Services\Notify\Facades\Notify::render() !!}
@js(aAdmin('js/app.js'))
@stack('js')
</body>
</html>--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! env('APP_NAME') !!} - {!! env('CMS_AUTHOR') !!}</title>
    <!-- Favicon -->
    <link href="{{ asset('cms') }}/img/brand/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('cms') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('cms') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('cms') }}/css/argon.min.css" rel="stylesheet">
    <link href="{{ asset('cms') }}/vendor/jquery-ui/jquery-ui.css" rel="stylesheet">

    <link type="text/css" href="{{ asset('cms') }}/css/theme-donate.css" rel="stylesheet">
    @stack('css')
    {{--<link type="text/html" href="{{ asset('cms') }}/toastr/build/toastr.min.css" rel="stylesheet">--}}
</head>
<body class="{{ $class ?? '' }}">
@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('admin.layouts.navbars.sidebar', ['$unread_messages' => $unread_messages ?? null,])
@endauth

<div class="main-content">
    @include('admin.layouts.navbars.navbar')
    @yield('content')
</div>

@guest()
    @include('admin.layouts.footers.guest')
@endguest

<script>
    var dir = '{!! url(env('CMS_PREFIX', 'admin')) !!}',
        csrf = '{!! csrf_token() !!}';
</script>
<script src="{{ asset('cms') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('cms') }}/vendor/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('cms') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
{{--<script src="{{ asset('cms') }}/vendor/z-select/z-select.js"></script>--}}
{{--<script src="{{ asset('cms') }}/vendor/toastr/build/toastr.min.js"></script>
{!! App\Services\Notify\Facades\Notify::render() !!}--}}

@stack('js')

<!-- Argon JS -->
<script src="{{ asset('cms') }}/js/argon.js?v=1.0.0"></script>
<script src="{{ asset('cms') }}/js/app.js"></script>
</body>
</html>
