<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Majid Mohammadpanah | www.majidmohammadpanah.com" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('laravel.ico') }}" />


</head>
<body class="font-sans antialiased cursor-default">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation-user')

<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="py-6">
            <nav aria-label="Breadcrumb">
            <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <x-bread-link :href="route('articles')" :active="request()->routeIs('articles')">
                            Blog
                        </x-bread-link>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <x-bread-link :href="route('article.single',[$article->slug])" :active="request()->routeIs('article.single')">
                            {{ $article->title }}
                        </x-bread-link>
                    </div>
                </li>

            </ol>
        </nav>
        </div>
    </header>

    <!-- Page Content -->
    <main>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-6">

                        <!-- Product info -->
                        <div class="w-full lg:grid lg:grid-cols-3 lg:gap-x-3">
                            <div class="lg:col-span-2 h-full flex flex-col shadow-sm">
                                <img src="{{ $article->images['thumb'] }}"  alt="{{ $article->title }}" class="border border-gray-200 hover:opacity-90 transition duration-200 transform w-full h-auto object-center object-cover">

                                <!-- Description and details -->
                                <div class="mt-3 p-3 flex flex-col flex-1">
                                    <a href="{{ route('article.single',[$article->slug]) }}" class="decoration-0 ">
                                    <h1 class="text-2xl font-extrabold text-gray-800 hover:text-indigo-800 duration-200 transition">{{ $article->title }}</h1>
                                    </a>
                                    <div class="my-3 flex flex-col flex-grow">
                                        {!!   $article->body !!}
                                    </div>
                                    @if( $article->categories)
                                        <div class="mt-5 mb-2 cursor-default">
                                            @foreach( $article->categories as $cate)
                                                <a class="decoration-0" href="{{ route('category.articles',$cate->slug) }}"><span class="text-xs inline-block py-1 pr-2 text-center whitespace-nowrap duration-200 transition align-baseline hover:text-indigo-800">{{ $cate->title }}</span></a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if( $article->tags)
                                        <div class="mb-2 cursor-default">
                                            @foreach( $article->tags as $tag)
                                                <a class="decoration-0" href="{{ route('tag.articles',$tag->slug) }}"><span class="text-xs inline-block py-1 px-2 text-center whitespace-nowrap duration-200 transition align-baseline bg-gray-100 hover:bg-gray-200 text-gray-900 rounded">#{{ $tag->slug }}</span></a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="mt-5 lg:mt-0 lg:col-span-1 flex flex-col h-full">

                                <div class="flex border border-gray-80 border-opacity-60 shadow-sm px-4 py-5 mb-5">

                                    <div class="mr-3 flex-shrink-0">
                                        <a href="" class="rounded-full flex-shrink-0 flex overflow-hidden w-14 h-14">
                                            <img class="w-full h-full hover:scale-110 border border-gray-200 transition duration-200 transform object-cover" src="{{ $article->user->profile_photo_path }}" alt="{{ $article->user->name }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="" class="text-gray-800 hover:text-indigo-800 transition duration-200 font-bold mb-2">{{ $article->user->name }}</a>
                                        <p class="text-gray-500 font-normal text-xs my-1">{{ $article->user->username }}</p>
                                    </div>

                                </div>

                                <div class="border border-gray-80 border-opacity-60 shadow-sm py-5 px-5 flex flex-col flex-1">
                                    <h2 class="mb-4 text-xl font-extrabold tracking-tight text-indigo-800">Latest Articles</h2>

                                    <div class="mb-3 flex flex-col flex-grow">
                                        @foreach($articles as $article)

                                            <div class="flex items-start bg-gray-50 rounded shadow-sm mb-3 py-3 px-3">
                                                <div class="w-full ">
                                                    <a href="{{ route('article.single',[$article->slug]) }}" class="text-gray-900 hover:text-indigo-800 font-bold transition duration-200">
                                                        <h1 class="text-lg">{{ $article->title }}</h1>
                                                    </a>
                                                    <div>
                                                        <p class="text-gray-700 font-normal text-sm mt-1">{{ $article->user->name }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                    <div class="flex justify-center">
                                        <a href="{{ route('articles') }}" class="font-semibold bg-indigo-600 hover:bg-indigo-700 justify-center text-white text-sm border border-transparent px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition duration-200">
                                            All Articles
                                        </a>
                                    </div>
                                </div>

                            </div>


                        </div>

                </div>
            </div>
        </div>
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
