<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Lawrence's Portfolio")</title>
    <link rel="icon" href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico" type="image/x-icon">

    {{-- Fonts and external styles --}}
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
