
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cusro de laravel 10</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('icones/apple-touch-icon.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('icones/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('icones/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{asset('icones/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('icones/safari-pinned-tab.svg')}}" color="#7952b3">
    <link rel="icon" href="{{asset('icones/favicon.ico')}}">
    <link rel="icon" href="{{asset('icones/style.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta name="theme-color" content="#7952b3">




</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <!--inclue um bloco de codigo -->
        @include('components.navegacao')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!--usndo o content ele vai renderizar somenteo o que tiver abaixo  , a parte acima do codigo ele sempre irá reaproveitar
             é usado para renderizar outras paginas dentro desse conteudo-->
            @yield('content')
            <!--grafico
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            -->
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/feather.min.js"></script>

<script src="/js/dashboard.js"></script>
{{-- InputMask --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

{{-- BlocUI loading --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
<script src="/js/projeto.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>
