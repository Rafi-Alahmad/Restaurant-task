<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('app.login_page') }}</title>
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
                {{ __('Login') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">{{ __('E-Mail Address') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">{{ __('Password') }}</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-9 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <hr style="height: 0.5px;">
                <div class="text-center">
                    {{ trans('app.dont_have_account_q') }} <a class="text-decoration-none" href="{{route('register')}}">{{ trans('app.create_new') }}</a>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>