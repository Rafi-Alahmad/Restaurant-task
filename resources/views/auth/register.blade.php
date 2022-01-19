
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('app.register_page') }}</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradiant-background {
            background: rgb(255, 29, 0);
            background: radial-gradient(circle, rgba(255, 29, 0, 0.2836484935771183) 0%, rgba(235, 253, 0, 0.2752451322325805) 100%);
        }
    </style>
</head>

<body class="gradiant-background">
    <div class="container d-flex h-100" style="max-width: 600px;">
        <div class="card w-100 my-auto">
            <div class="card-header text-center">
                {{ trans('app.registration') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-4 col-form-label">{{ trans('app.restaurant_name') }}</label>
                        <div class="col-sm-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label">{{ __('E-Mail Address') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">{{ __('Password') }}</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-sm-4 col-form-label">{{ __('Confirm Password') }}</label>
                        <div class="col-sm-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="row mt-5 mb-0">
                        <div class=" ms-auto w-auto">
                            <button type="reset" class="ms-auto btn btn-secondary">
                                {{ trans('app.reset') }}
                            </button>
                            <button type="submit" class=" btn btn-primary">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </div>
                </form>
                <hr style="height: 0.5px;">
                <div class="text-center">
                    {{ trans('app.have_account_q') }} <a class="text-decoration-none" href="{{route('login')}}">{{ __('Login') }}</a>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>