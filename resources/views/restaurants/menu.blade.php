<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$restaurant->name}}</title>

    <link href="{{url('/')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/Responsive-2.2.9/css/responsive.bootstrap5.min.css">

</head>

<body>
    <main>
        <div class="b-example-divider"></div>

        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="{{Storage::url($restaurant->logo)}}" style="max-width: 40px;" alt="">
                    <span class="mx-2 fs-4">{{$restaurant->name}}</span>
                </div>

                <div class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    {{trans('app.menu')}}
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
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                @if(!empty($restaurantServicesTypes->toArray()))
                                @foreach($restaurantServicesTypes as $type)
                                <div class="col-md-6 mb-5">
                                    <div class="text-center">
                                        <h2 class="">
                                            {{trans('app.'.$type->type.'s')}}
                                        </h2>
                                        <hr class="mx-auto w-25 opacity-50" style="height: 4px; color: #c50e1f;">
                                    </div>
                                    <div class="row mt-5">
                                        @foreach($restaurantServices as $service)
                                        @if($service->type == $type->type)
                                        <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="{{Storage::url($service->image)}}" class="img-fluid rounded-start w-100" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{$service->title}}</h5>
                                                            <p class="card-text mb-0"><small class="text-muted">{{$service->subtitle}}</small></p>
                                                            <p class="card-text">{{$service->description}}</p>
                                                            <p class="card-text"><small class="text-muted">{{$service->price}} TL</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="text-center">
                                    <h1 class="text-danger">Menu is empty</h1>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{url('/')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>