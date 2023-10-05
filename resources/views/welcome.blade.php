<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- agrega el icono -->
    <link rel="icon" href="{{ asset('icon.png') }}">

    <title>Becadosvilla</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    body {
        background-image:url("{{ asset('/app/Padreal.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;

    }

    .center {
        align-items: center;
        text-align: center;
        justify-content: center;
        padding-top: 100px;
    }

    .color {
        color: #a80083;

    }

    .colorv {
        color: #a80083;

    }
    </style>


</head>

<body>
    <div class="d-flex justify-content-end">
        @if (Route::has('login'))
        <div class="p-3 ">
            @auth

            <a href="{{ url('/dashboard') }}" class="text-color5 nav-item colrov"><i class="fas  fa-home fa-1x"></i>
                Home
            </a>
            @else
            <a href=" {{ route('login') }}" class="text-color5 nav-item colorv"><i class='fas fa-user fa-1x'></i>
                Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-color5 nav-item colorv"><i class='fas fa-user fa-1x'></i>
                Register</a>


            @endif
            @endauth
        </div>
        @endif





    </div>


    <div class="center" class=" justify-center sm:items-center align-items-center">


        <div class="center color fw-bold fs-1">Programa de Becas <br>
            Villa de los Niños</div>

    </div>



</body>

</html>