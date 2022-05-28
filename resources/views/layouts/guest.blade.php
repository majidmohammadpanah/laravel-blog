<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Majid Mohammadpanah | www.majidmohammadpanah.com" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="shortcut icon" href="{{ asset('laravel.ico') }}" />


    </head>
    <body class="cursor-default">
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')

    </body>
</html>
