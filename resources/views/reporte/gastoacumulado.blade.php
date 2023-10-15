<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
    body {
        margin-right: 1rem;
    }
    </style>

</head>

<body>




    <div> <img width=" 80px" class="float-left" src="http://localhost/becadosvilla/public/app/logovillavvv.jpeg" />

    </div>
    <div class="container">

        <p class="font-weight-lighter">{{ "Carretera Chalco-Mixquic"}}<br>
            Km. 2, Chalco, Estado de México<br>
            Tel.: 01 55 5975 1819<br class=" font-italic">
            becas.villadelosninos@gmail.com</p>


    </div>

    <span class="d-block p-1 bg-primary text-white"></span>
    <br>
    <div>
        Programas de Beca de las Hermanas de María Chalco, México
    </div>
    <br>
    <div>
        <strong> Informe de Gastos Acumulado

        </strong>

    </div>
    <div>
        <strong> Becario:
        </strong>{{$becado->nombre.' ' .$becado->ApellidoP.' ' . $becado->ApellidoM}}
    </div>
    <div>
        <strong>Programa de Beca:
        </strong>{{$becado->programa->nombre}}
    </div>


    <div>
        <strong class="font-weight-bolder"> Carrera:
        </strong>{{$becado->Carrera}}
    </div>

    <div class="row">
        <div class="col-12">
            <strong class="font-weight-bolder">Universidad:</strong>
            {{$becado->Universidad}}
        </div>


    </div>
    <br>


    <section>
        <table class=" table table table-hover table-striped table-sm">
            <thead class=" thead  align-top">
                <tr>
                    <th>Meses</th>
                    @foreach(array_keys($datos) as $ano)
                    <th>{{ $ano }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @for($mes = 1; $mes <= 12; $mes++) <tr>
                    <td>{{ DateTime::createFromFormat('!m', $mes)->format('F') }}</td>
                    $colt =0;
                    @foreach(array_keys($datos) as $ano)
                    <td>
                        @if(isset($datos[$ano][$mes]))

                        <slot>$</slot>{{ number_format($datos[$ano][$mes], 2, ".", ",") }}
                        @else
                        $ 0.00
                        @endif
                    </td>
                    {{$colt++;}}
                    @endforeach
                    </tr>
                    @endfor
                    <tr>
                        <th>Total Anual</th>
                        @foreach(array_keys($datos) as $ano)
                        <th style="text-align:center;">
                            <slot>$</slot>{{ number_format($totalesAnuales[$ano], 2, ".", ",") }}
                        </th>
                        @endforeach
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th COLSPAN="{{$colt}}" scope="row" style="text-align:center;"> Monto Total

                        <slot>$</slot>{{ number_format($total, 2, ".", ",") }}
                    </th>


                </tr>
            </tfoot>
        </table>
    </section>


</body>