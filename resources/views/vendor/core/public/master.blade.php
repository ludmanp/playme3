<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:site_name" content="{{ $websiteTitle }}">
    <meta property="og:title" content="@yield('ogTitle')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::full() }}">
    <meta property="og:image" content="@yield('ogImage')">

    @if (config('typicms.twitter_site') !== null)
        <meta name="twitter:site" content="{{ config('typicms.twitter_site') }}">
        <meta name="twitter:card" content="summary_large_image">
    @endif

    @if (config('typicms.facebook_app_id') !== null)
        <meta property="fb:app_id" content="{{ config('typicms.facebook_app_id') }}">
    @endif

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <link href="{{ App::environment('production') ? mix('css/custom.css') : asset('css/custom.css') }}"
          rel="stylesheet">

    @include('core::public._feed-links')

    @stack('css')
</head>
<body>
{{--<div class='ruler' style='position: fixed; z-index: 1000; top: 100px; height: 100px; width: 20px; background: #bada55; left: 50%; transform: translateX(-50%);'></div>--}}

<div class='page'>
{{--    @include('core::_navbar')--}}

{{--    @auth--}}
{{--        @if(auth()->user()->isImpersonating())--}}
{{--            <a class="stop-impersonation-button" href="{{ route($lang.'::stop-impersonation') }}">@lang('Stop impersonation')</a>--}}
{{--        @endif--}}
{{--    @endauth--}}
    @yield('header', view('components.common.header'))

    <main class="page__main">

        @yield('content')
    </main>

    @yield('footer', view('components.common.footer'))
</div>


<script src="{{ App::environment('production') ? mix('js/public.js') : asset('js/public.js') }}"></script>
@can('see unpublished items')
    @if (request('preview'))
    <script src="{{ asset('js/previewmode.js') }}"></script>
    @endif
@endcan

@stack('js')
</body>
</html>
