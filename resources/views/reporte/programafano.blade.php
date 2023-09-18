<head>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



    <style>
        body {

            margin-top: 3.32cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            font-family: "Times New Roman", serif;
            /*        font-family: 'sans-serif'; */
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            margin-bottom: 2cm;


            line-height: 35px;
        }
    </style>

</head>




<body>
    <header>
        <span id="card_title">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <img width="80px" src="http://localhost/becadosvilla/public/app/logovillavvv.jpeg" />



                <h4 style="text-align: center">
                    {{$programa->nombre}}
                </h4>

            </div>
            <br>
        </span>
    </header>


    <main>


        <div class="container mt-10vh ">

            <div class="row justify-content-center">





                @foreach ($becados as $becado)
                <div class="col-12">
                    <div class="card  mt-3 mb-3">


                        <div class="card-body d-flex justify-content-between">
                            <table>
                                <tr>
                                    <th>
                                        <div class="border-3 border-primary  border-right ml-2 mr-3">
                                            <div>
                                                <div class="sticky-top-end translate-middle W-100px">
                                                    <label class=" rounded bg-primary border-primary border border-3 text-white  fw-bold w-100px">
                                                        {{ ++$i }}
                                                    </label>
                                                </div>
                                                <img height="100px" width="80px" src="http://localhost/becadosvilla//storage/app/images/{{$becado->Foto_path}}" class="rounded border border-gray border-5 mb-3  mr-3 border-right ">
                                            </div>
                                        </div>
                                    </th>
                                    <td class="justify-content-center">

                                        <p class="text-left font-weight-bold"> {{ $becado->nombre }}
                                            {{ $becado->ApellidoP }}
                                            {{ $becado->ApellidoM }}
                                        </p>
                                        <p class="text-left  font-light"> BS: {{ $becado->Carrera}}
                                        </p>
                                        <p class="text-left  font-light"> Year of graduation:
                                            {{ \Carbon\Carbon::parse( $becado->Duracion)->Locale('us')->formatLocalized('%B %Y')}}
                                        </p>
                                        <p class="text-left">{{ $becado->Universidad }}</p>
                                        @if($becado->status == "Graduado")
                                        <p class="text-left font-weight-bold text-primary">{{ $becado->status }}
                                            {{ \Carbon\Carbon::parse( $becado->AnodeGraduacion)->Locale('es')->formatLocalized('%Y')}}
                                        </p>
                                        @elseif ($becado->status == "Baja")
                                        <p class="text-left font-weight-bold text-danger">{{ $becado->status }}
                                            {{ \Carbon\Carbon::parse( $becado->AnodeGraduacion)->Locale('es')->formatLocalized('%Y')}}
                                        </p>
                                        @else
                                        <p class="text-left font-weight-bold text-success">{{ $becado->status }}

                                        </p>

                                        @endif


                                    </td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>





                @endforeach



            </div>
        </div>
    </main>
</body>