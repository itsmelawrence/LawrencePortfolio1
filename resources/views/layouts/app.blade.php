<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Lawrence's Portfolio")</title>
    <meta name="description" content="@yield('description', 'Lawrence Tendenilla — Web & graphic designer crafting clean, purposeful digital experiences. Available for freelance projects.')">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="@yield('title', "Lawrence's Portfolio")">
    <meta property="og:description" content="@yield('description', 'Lawrence Tendenilla — Web & graphic designer crafting clean, purposeful digital experiences. Available for freelance projects.')">
    <meta property="og:image" content="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title', "Lawrence's Portfolio")">
    <meta name="twitter:description" content="@yield('description', 'Lawrence Tendenilla — Web & graphic designer crafting clean, purposeful digital experiences. Available for freelance projects.')">
    <meta name="twitter:image" content="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico">

    <link rel="icon" href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico" type="image/x-icon">

    @include('partials.fonts')
    @include('partials.styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @yield('content')

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
