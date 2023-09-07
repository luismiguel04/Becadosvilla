<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            margin-right: 3rem;
        }
    </style>

</head>

<body>
    <span id="card_title">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <img width="80px" src="http://localhost/becadosvilla/public/app/logovillavvv.jpeg" />



            <h3 style="text-align: center">
                Graduados Beca Villa de los Niños Año {{$id}}
            </h3>

        </div>
        <br>


    </span>



    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">


                <table class="table table table-bordered table-striped">
                    <thead class="thead">
                        <tr>
                            <th>Número</th>

                            <th>Nombre del becado</th>
                            <th>Foto</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($becados as $becado)

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                {{ $becado->nombre }} {{ $becado->ApellidoP }} {{ $becado->ApellidoM }}
                            </td>
                            <td>
                                <img src="http://localhost/becadosvilla//storage/app/images/{{$becado->Foto_path}}">
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </section>


</body>