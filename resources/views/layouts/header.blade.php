<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Restaurant dashboard - {{ Auth::guard()->user()->name }}</title>




    <!-- Bootstrap core CSS -->
    <link href="{{url('/')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('/')}}/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="{{url('/')}}/toastr/build/toastr.min.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/css/dashboard.css" rel="stylesheet">

    @stack('header')
</head>

