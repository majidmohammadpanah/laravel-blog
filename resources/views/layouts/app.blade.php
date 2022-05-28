<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="Majid Mohammadpanah | www.majidmohammadpanah.com" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="shortcut icon" href="{{ asset('laravel.ico') }}" />
    </head>
    <body class="font-sans antialiased cursor-default">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

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
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
        <footer class="p-4 bg-white shadow md:flex md:items-center md:justify-between md:p-6">
<span class="text-sm text-gray-500 sm:text-center">© 2022 Made With <a href="https://laravel.com" target="_blank" class="hover:text-red-600 duration-200 transition">Laravel </a><span class="text-xs">v{{ Illuminate\Foundation\Application::VERSION }}</span> . All Rights Reserved.
</span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 sm:mt-0">
                <li>
                    <a href="/sitemap" target="_blank" class="mr-4 hover:underline md:mr-6 hover:text-indigo-800 duration-200 transition">Sitemap</a>
                </li>
                <li>
                    <a href="/feed" target="_blank" class="mr-4 hover:underline md:mr-6 hover:text-indigo-800 duration-200 transition">Feed</a>
                </li>
            </ul>
        </footer>
    </body>
</html>
