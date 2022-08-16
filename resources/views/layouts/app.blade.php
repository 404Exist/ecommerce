<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    <script>
        let menuBar = document.querySelector('#menuBar')
        let mobileMenu = document.querySelector('#mobileMenu')
        let closeMenu = document.querySelector('#closeMenu')

        menuBar.addEventListener('click', function(){
            mobileMenu.classList.remove('hidden')
        })

        closeMenu.addEventListener('click', function(){
            mobileMenu.classList.add('hidden')
        })
    </script>
    @stack('js')
</body>
</html>
