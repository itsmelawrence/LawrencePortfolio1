<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $pageTitle = $__env->yieldContent('title', "Lawrence's Portfolio");
        $pageDesc  = $__env->yieldContent('description', 'Lawrence Tendenilla — Web & graphic designer crafting clean, purposeful digital experiences. Available for freelance projects.');
        $ogImage   = 'https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico';
    @endphp

    <title>{!! $pageTitle !!}</title>
    <meta name="description" content="{{ $pageDesc }}">
    <meta name="author" content="Lawrence Tendenilla">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDesc }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico" type="image/x-icon">

    <script>
        (function(){var t=localStorage.getItem('theme');if(t)document.documentElement.setAttribute('data-theme',t);})();
    </script>

    @include('partials.fonts')
    @include('partials.styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div id="loader" aria-hidden="true">
        <svg class="loader-svg" viewBox="0 0 120 70" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line class="loader-line" id="l-vert" x1="15" y1="8"  x2="15" y2="58"/>
            <line class="loader-line" id="l-horiz" x1="15" y1="58" x2="42" y2="58"/>
            <line class="loader-line" id="t-horiz" x1="58" y1="8"  x2="105" y2="8"/>
            <line class="loader-line" id="t-vert"  x1="81" y1="8"  x2="81" y2="58"/>
        </svg>
    </div>

    <div id="scrollProgressBar"></div>

    <button id="darkModeToggle" class="darkmode-toggle" aria-label="Toggle dark mode">
        <i id="darkModeIcon" class="fa-solid fa-moon"></i>
    </button>

    @yield('content')

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
