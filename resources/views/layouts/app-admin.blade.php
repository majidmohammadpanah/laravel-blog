<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Admin Panel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app-admin.css') }}">
    <link rel="shortcut icon" href="{{ asset('laravel.ico') }}" />


</head>
<body class="font-sans antialiased cursor-default">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation-admin')

<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>

    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<!-- Scripts -->

<script src="{{ asset('js/app-admin.js') }}" ></script>
@yield('scripts')
<footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6">
<span class="text-sm text-gray-500 sm:text-center">© 2022 <a href="https://laravel.com" class="hover:underline">Laravel </a>v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) . All Rights Reserved.
</span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 sm:mt-0">
        <li>
            <a href="/sitemap" target="_blank" class="mr-4 hover:underline md:mr-6 ">Sitemap</a>
        </li>
        <li>
            <a href="/feed" target="_blank" class="mr-4 hover:underline md:mr-6">Feed</a>
        </li>
    </ul>
</footer>
</body>
</html>
