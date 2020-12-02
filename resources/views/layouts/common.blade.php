<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        <title>@yield('title')</title>
    </head>
    
    <body>
        <header>
            @include('includes.header')
        </header>

        <main class="has-background-black has-text-white">
            @yield('main')
        </main>

        <footer class="footer my-4">
            @include('includes.footer')
        </footer>
    </body>
</html>