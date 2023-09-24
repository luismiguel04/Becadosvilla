<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            margin-right: 2rem;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        p {
            margin: 0px;
        }

        .mar {
            margin-left: 180px;
        }
    </style>

</head>

<body>




    <div> <img width=" 80px" class="float-left" src="http://localhost/becadosvilla/public/app/logovillavvv.jpeg" />

    </div>
    <div class="container justify-container:center border-bottom border-primary">

        <p class="font-weight-lighter  text-primary text-center">
            {{$programab->nombre}}
        </p>
        <p class="font-weight-lighter font-weight-bold text-center">
            STATEMENT OF AVAILABLE FUND BALANCE
        </p>
        <p class="font-weight-lighter font-italic  text-center">
            (for the existing and future scholars in Mexico)
            <br>
            as of
            {{ \Carbon\Carbon::parse( $fechap)->Locale('en')->formatLocalized('%B %d, %Y')}}
        </p>


    </div>





    <br>


    <section class=" content container-fluid">

        <div class="row ">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col-9 mar">
                <div class="table-responsive">

                    <table class="table table-sm">
                        <thead class=" thead  align-top">
                            <tr>
                                <th></th>
                                <th> <small class="font-weight-bold text-center">Mexican Peso </small> </th>
                                <th><small class="font-weight-bold text-center">US Dollar</small></th>

                            </tr>
                            <tr>
                                <th class=" text-primary"><small>Beginning Fund {{$begfod}}</small></th>

                                <th class="text-right"><small>
                                        <slot> $</slot>{{ number_format($begfom, 2, ".", ",") }}
                                    </small>
                                </th>
                                <th class="text-right"><small>
                                        <slot> $</slot>
                                        {{ number_format($begfomd, 2, ".", ",") }}
                                    </small> </th>

                            </tr>
                            <tr>
                                <th class="text-primary"><small>Add: Fund Received {{$addfod}} </small>
                                </th>
                                <th class="text-right"><small>
                                        <slot> $</slot>{{ number_format($addfom, 2, ".", ",") }}
                                    </small> </th>
                                <th class="text-right"><small>
                                        <slot> $</slot>
                                        {{ number_format($addfomd, 2, ".", ",") }}
                                    </small></th>

                            </tr>
                            <tr>
                                <th class="text-primary"><small>Add: Interest Earned as of
                                        {{$fechap}}</small>
                                </th>
                                <th class="text-right"><small>
                                        <slot> $</slot>{{ number_format($interes, 2, ".", ",") }}
                                    </small> </th>
                                <th class="text-right"><small>

                                    </small></th>

                            </tr>
                            <tr>
                                <th class=" text-primary"><small class="font-weight-bold">Total Fund</small> </th>
                                <th class="text-right"> MXN <slot> $</slot>{{ number_format($TotalFound, 2, ".", ",") }}
                                </th>
                                <th class="text-right">USD <slot> $</slot>{{ number_format($TotalFoundD, 2, ".", ",") }}
                                </th>

                            </tr>
                        </thead>
                    </table>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 ">


                <div class="table-responsive">
                    <p class="text-danger font-weight-bold">Less: Expenses</p>
                    <p class="text-danger">Tuition, living allowance and other fees
                    </p>
                    <br>
                    <table class=" table  table-bordered  table-sm">
                        <thead class=" thead  align-top">

                            <tr>
                                <th></th>
                                <th>Becado</th>
                                <th class="text-center">MXN</th>
                                <th class="text-center">USD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $detalle)

                            <tr>
                                <td>{{ ++$i }}</td>

                                <td><small>
                                        {{ $detalle->becado->nombre }}
                                        {{ $detalle->becado->ApellidoP }}
                                        {{ $detalle->becado->ApellidoM }} (
                                        {{$detalle->becado->Carrera}} )
                                        @if($detalle->becado->status=="Graduado")
                                        <a class="font-italic">
                                            - {{ $detalle->becado->status }}
                                        </a>
                                        @endif



                                    </small>
                                <td><small>
                                        <slot> $</slot>
                                        {{ number_format($detalle->total, 2, ".", ",") }}
                                    </small>
                                </td>
                                <td></td>


                            </tr>@endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th COLSPAN="2" scope="row" class="text-right"> TOTAL EXPENSES
                                </th>
                                <td class="text-danger font-weight-bold">
                                    <slot class="text-danger">$</slot> {{ number_format($totalp, 2, ".", ",") }}

                                </td>
                                <td class="text-danger font-weight-bold">
                                    <slot class="text-danger">$</slot>{{ number_format($totalD, 2, ".", ",") }}

                                </td>


                            </tr>
                            <tr>
                                <th COLSPAN="2" scope="row" class="text-right"> FUND BALANCE AS OF {{$fechap}}
                                </th>
                                <td class=" font-weight-bold">
                                    <slot>$</slot>{{ number_format($FundBalance, 2, ".", ",") }}

                                </td>
                                <td class=" font-weight-bold">
                                    <slot>$</slot>{{ number_format($FundBalanceD, 2, ".", ",") }}



                                </td>


                            </tr>

                        </tfoot>
                    </table>

                    <p class="text-right font-italic"><small> (Converted @ MXN{{$tc}}
                            {{$fechap}} exchange
                            rate)</small></p>


                    <p>Noted by:</p>
                    _______________________________

                    <br>
                    <p>
                        {{$nombre}}
                    </p>
                    <p>
                        Scholarship Coordinator
                    </p>



                </div>
            </div>
        </div>
    </section>


</body>