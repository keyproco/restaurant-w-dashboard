@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.nav')
        </div>
        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
