<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
        <strong> Mes:

        </strong>
        {{ \Carbon\Carbon::parse($fecha)->Locale('es')->formatLocalized(' %B %Y')}}

    </div>

    <div>
        <strong>Programa de Beca:
        </strong>{{$programab->nombre}}
    </div>



    <br>





    <section class=" content container-fluid">

        <div class="row">
            <div class="col-12 ">
                <!--  <div class="table-responsive"> -->
                <div class="row">
                    <div class="col-6  mx-auto">
                        <table class=" table table table-bordered table-striped table-sm">
                            <thead class=" thead  align-top">
                                <tr>
                                    <th>Número</th>
                                    <th>Becado</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalles as $detalle)

                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>
                                        {{ $detalle->becado->nombre }}
                                        {{ $detalle->becado->ApellidoP }}
                                        {{ $detalle->becado->ApellidoM }}

                                    </td>
                                    <td>

                                        <slot>$</slot>{{ number_format($detalle->Monto, 2, ".", ",") }}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th COLSPAN="2" scope="row" style="text-align:center;"> Monto Total
                                    </th>
                                    <th>
                                        <slot>$</slot>{{ number_format($total, 2, ".", ",") }}
                                    </th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!--  </div> -->
            </div>
        </div>
    </section>


</body>