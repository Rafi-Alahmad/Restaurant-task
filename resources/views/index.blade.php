@include('layouts.header')
<body>
    @include('layouts.navbar')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>