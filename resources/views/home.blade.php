<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>

    <link href="{{url('/')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('/')}}/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/Responsive-2.2.9/css/responsive.bootstrap5.min.css">

    <style>
        .clickable-row:hover {
            background-color: #00000012;
        }
    </style>
</head>

<body>
    <main>
        <div class="b-example-divider"></div>

        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="{{Storage::url('img/restaurant.png')}}" style="max-width: 40;" alt="">
                </a>

                <div class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    {{env("APP_NAME")}}
                </div>

                <div class="col-md-3 text-end">
                    @auth
                        <a href="{{ route('settings') }}" class="btn btn-outline-primary">{{trans('app.dashboard')}}</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            </header>
        </div>
    </main>
    <div class="container mt-5">
        <section id="responsive-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $dataTable->table([
                                "class" => "responsive table",
                                "style" => ""
                                    ])
                                }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{url('/')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/jQuery/jquery-3.6.0.min.js"></script>

    <script src="{{ url('/') }}/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/DataTables/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/DataTables/Responsive-2.2.9/js/responsive.bootstrap5.js"></script>


    {!! $dataTable->scripts() !!}

    <script>
        function rowSelected(element) {
            console.log($(element).attr('id'));
            window.open("{{route('restaurant')}}"+"?restaurant="+$(element).attr('id'));
        }
    </script>
</body>

</html>