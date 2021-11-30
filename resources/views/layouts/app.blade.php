<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partial.head')

<body>
    <div id="app">
        
        @include('partial.nav')

        <main class="py-4">
            @include('partial.messages')
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @include('partial.script')

</body>
</html>
