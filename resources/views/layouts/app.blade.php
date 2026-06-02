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

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDesc }}">
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

    @include('partials.fonts')
    @include('partials.styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div id="scrollProgressBar"></div>

    <button id="darkModeToggle" class="darkmode-toggle" aria-label="Toggle dark mode">
        <i id="darkModeIcon" class="fa-solid fa-moon"></i>
    </button>

    @yield('content')

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
