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

    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">

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
    @section('header')
        <x-common.header>
            <x-slot name="menu">
                <x-common.link :href="'#'">Услуги</x-common.link>
                <x-common.link :href="'#'">Клиенты</x-common.link>
                <x-common.link :href="'#'">Команда</x-common.link>
                <x-common.link :href="'#'">Блог</x-common.link>
                <x-common.link :href="'#'">Контакты</x-common.link>
            </x-slot>
            <x-slot name="lang-switcher">
                <div class='header__languages'>
                    <x-common.link :currentLang="true" :href="'#'">RU</x-common.link>
                    <x-common.link :href="'#'">EN</x-common.link>
                </div>
            </x-slot>
        </x-common.header>
    @endsection
    @yield('header')


    <main class="page__main">

        @yield('content')
    </main>

        @section('footer')
            <x-common.footer>
                <x-slot name="menu">
                    <x-common.link :href="'#'">Услуги</x-common.link>
                    <x-common.link :href="'#'">Клиенты</x-common.link>
                    <x-common.link :href="'#'">Команда</x-common.link>
                    <x-common.link :href="'#'">Блог</x-common.link>
                    <x-common.link :href="'#'">Контакты</x-common.link>
                </x-slot>
                <x-slot name="social-menu">
                    <x-common.link :href="'#'">vk</x-common.link>
                    <x-common.link :href="'#'">ig</x-common.link>
                    <x-common.link :href="'#'">fb</x-common.link>
                </x-slot>
                <x-slot name="legal-menu">
                    <x-common.link href="'#'">Политика конфиденциальности</x-common.link>
                </x-slot>
            </x-common.footer>
        @endsection
        @yield('footer')
</div>


<script src="{{ App::environment('production') ? mix('js/public.js') : asset('js/public.js') }}"></script>
@stack('js')
</body>
</html>
