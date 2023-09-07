<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
    body {
        margin-right: 3rem;
    }
    </style>

</head>

<body>

    <div class="container justify-content-end">
        <div class="row align-items-start">
            <img class="float-right" src="http://localhost/becadosvilla/public/app/logovillavvv.jpeg" width="80px">
            <img class="float-left" src="http://localhost/becadosvilla//storage/app/images/{{$becado->Foto_path}} "
                width="203.2px" height="254px">

        </div>
        <br><br><br><br> <br>
        <br><br><br><br> <br><br>
    </div>



    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12 ">


                <div class="table-responsive ">
                    <table class="table table-bordered table table-sm  table table-striped">
                        <thead>
                            <tr>
                                <th colspan="4">

                                    <div style="text-align:center;">
                                        <strong>Datos
                                            Personales
                                        </strong>

                                    </div>


                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4"><strong>Nombre:</strong>
                                    {{ $becado->nombre }} {{ $becado->ApellidoP }} {{ $becado->ApellidoM }}
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2"> <strong>Fecha de nacimiento:</strong>
                                    {{ \Carbon\Carbon::parse($becado->fecha)->format('d/m/Y')}}
                                </td>
                                <td colspan="2"><strong> Lugar de Nacimiento:</strong>
                                    {{ $becado->LugarN }}
                                </td>

                            </tr>
                            <tr>
                                <th> <strong>Dirección Permanente:</strong>
                                </th>
                                <td colspan="3"> {{ $becado->DireccionP }}

                                </td>
                            </tr>
                            <tr>
                                <th><strong>Dirección Actual:</strong>
                                </th>
                                <td colspan="3"> {{ $becado->DireccionA }}

                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"> <strong>Teléfono Celular:</strong>
                                    {{ $becado->TelefonoC }}
                                    <strong>Correo Electrónico:</strong>
                                    {{ $becado->Correo }}
                                </td>
                            </tr>
                            <tr>
                                <th><strong>Padre:</strong>


                                </th>
                                <td colspan="3"> {{ $becado->NombreP }}

                                </td>
                            </tr>
                            <tr>
                                <th> <strong>Madre:</strong>
                                </th>
                                <td colspan="3">{{ $becado->NombreM }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Número de hermanos:</strong>

                                    {{ $becado->NumHermanos }}
                                </td>
                                <td colspan="2"><strong>Año de Entrada a Villa:</strong>
                                    {{ $becado->AnoEntradaVilla }}

                                </td>

                            </tr>
                            <tr>
                                <td colspan="2"><strong>Año de Graduación de secundaria:</strong>
                                    {{ $becado->AnoGradSec }}

                                </td>
                                <td colspan="2"><strong>Año de Graduación de bachillerato:</strong>
                                    {{ $becado->AnoGradBach }}
                                </td>

                            </tr>
                            <tr>
                                <th><strong>Trabajo actual:</strong>


                                </th>
                                <td colspan="3">{{ $becado->TrabajoAct }}

                                </td>
                            </tr>

                            <tr>
                                <td colspan="4"> <strong>Facebook:</strong>
                                    {{ $becado->Facebook }}
                                    <strong>Instagram:</strong>
                                    {{ $becado->Instagram }}
                                    <strong>Otra red:</strong>
                                    {{ $becado->OtraRed }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"> <strong>Contacto de Emergencia:</strong>
                                    {{ $becado->ContactoEmergencia }}
                                    <strong>Telefono:</strong>
                                    {{ $becado->TelefonoEmergencia}}
                                </td>
                            </tr>
                        </tbody>

                    </table>

                    <table class="table table-bordered table table-sm  table table-striped">
                        <thead>
                            <tr>
                                <th colspan="4" style="text-align:center;"> <strong>Datos Sobre
                                        la
                                        Beca</strong>

                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th colspan="1"> <strong>Universidad:</strong>
                                </th>
                                <td colspan="3">
                                    {{ $becado->Universidad}}
                                </td>
                            </tr>
                            <tr>
                                <th colspan="1"> <strong>Carrera:</strong>
                                </th>
                                <td colspan="3">
                                    {{ $becado->Carrera}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"> <strong>Fecha de inicio en la beca:</strong>


                                    {{ \Carbon\Carbon::parse($becado->Anoiniciobeca)->format('d/m/Y')}}
                                    <strong>Status:</strong>
                                    {{ $becado->status }}
                                    <strong> Sitio de Servicio:</strong>
                                    {{ $becado->servicio->nombre }}

                                </td>
                            </tr>

                            @if($becado->status == "Graduado")

                            <tr>
                                <th> <strong>Fecha de Graduación:</strong>
                                </th>
                                <td>

                                    {{ \Carbon\Carbon::parse($becado->AnodeGraduacion)->format('d/m/Y')}}
                                </td>
                            </tr>
                            @endif
                            @if ($becado->status == "Baja")
                            <tr>
                                <th><strong>Fecha de Baja en la beca:</strong>
                                </th>
                                <td>
                                    {{ \Carbon\Carbon::parse($becado->FechadeBaja)->format('d/m/Y')}}
                                </td>
                            </tr>
                            @endif


                            <tr>
                                <td colspan="4"><strong>Programa:</strong>

                                    {{ $becado->programa->nombre }}
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>


</body>