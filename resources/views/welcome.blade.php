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
    <!-- Styles -->
    <style>
    /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
    *,
    ::after,



    /* TIPO DE LETRA Y TAMAÑO */
    html {

        text-align: center;
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 2;
        tab-size: 2;
        font-weight: bold;
        /* font-family: Figtree, sans-serif; */
        /*   font-family: cursive; */
        font-feature-settings: normal;


    }

    body {
        margin: 0;
        line-height: inherit;


    }

    hr {
        height: 0;
        color: inherit;
        border-top-width: 1px
    }

    .-mt-px {
        margin-top: -1px
    }

    .mr-1 {
        margin-right: 0.25rem
    }

    .flex {
        display: inline-block
    }

    .inline-flex {
        display: inline-flex
    }

    .grid {
        display: grid
    }

    .scale-100 {
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr))
    }

    .items-center {
        align-items: center
    }

    .justify-center {
        justify-content: center
    }

    .gap-6 {
        gap: 1.5rem
    }

    .gap-4 {
        gap: 1rem
    }

    .self-center {
        align-self: center
    }

    .rounded-lg {
        border-radius: 0.5rem
    }

    .rounded-full {
        border-radius: 9999px
    }



    .p-6 {
        padding: 1.5rem
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .text-center {
        text-align: center
    }

    .text-right {
        text-align: right
    }

    .text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem
    }

    .font-semibold {
        font-weight: 600
    }

    .leading-relaxed {
        line-height: 1.625
    }


    .focus\:rounded-sm:focus {
        border-radius: 0.125rem
    }





    .h-1 {

        text-align: center;
        justify-content: center;
        line-height: 3;
        -webkit-text-size-adjust: 50%;
        -moz-tab-size: 8;
        tab-size: 8;

        padding: 2rem;

    }





    @media (prefers-reduced-motion: no-preference) {
        .motion-safe\:hover\:scale-\[1\.01\]:hover {
            --tw-scale-x: 1.01;
            --tw-scale-y: 1.01;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }
    }



    @media (min-width: 640px) {
        .sm\:fixed {
            position: fixed
        }

        .sm\:top-0 {
            top: 0px
        }

        .sm\:right-0 {
            right: 0px
        }

        .sm\:ml-0 {
            margin-left: 0px
        }

        .sm\:flex {
            display: flex
        }

        .sm\:items-center {
            align-items: top
        }

        .sm\:justify-center {
            justify-content: left
        }

        .sm\:justify-between {
            justify-content: space-between
        }

        .sm\:text-left {
            text-align: left
        }

        .sm\:text-right {
            text-align: center
        }
    }

    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr))
        }
    }

    @media (min-width: 1024px) {
        .lg\:gap-8 {
            gap: 2rem
        }

        .lg\:p-8 {
            padding: 2rem
        }
    }

    * {
        margin: 0;
        padding: 0;
    }

    .caja {

        flex-flow: column wrap;
        justify-content: left !important;
        align-items: center;


    }

    .box {
        width: auto;
        height: 100vh;

        overflow: hidden;
        /*  padding-right: 10rem; */
    }

    .box img {
        width: 100%;
        height: 100%;
    }

    @supports(object-fit: cover) {
        .box img {
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }
    }

    .title {

        padding-top: 20%;
        text-align: center;
        justify-content: center;
        padding-right: 10%;
        padding-left: 15%;
        color: #0000FF;
    }

    .t {
        font-size: 50px;
        color: #000000;
    }

    .b {
        font-size: 40px;
        color: #303030;
    }
    </style>
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100  ">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm "><img
                    src="{{ asset('/app/logovillavvv.png') }}" width="70px"></a>
            @else
            <a href=" {{ route('login') }}">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>


            @endif
            @endauth
        </div>
        @endif
        <div class="box">
            <img src=" {{ asset('/app/fondo2.jpg') }}" alt=" Cargando imagen...">
        </div>

        <div class="title" style="color:#000000;">
            <div class="card bg-blue">
                <div class="t">Programa de Becas</div> <br>
                <div class="b">Villa de los Niños</div>

            </div>


        </div>




    </div>

    <style>
    body {
        /*  background-image: linear-gradient(to right, #FFFFFF 0%, #7600A9 25%, #0000ff 65%, #FFFFFF 90%); */
        background-color: #ffffff;
    }
    </style>



















</body>

</html>