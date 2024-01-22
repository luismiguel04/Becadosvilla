@extends('layouts.app')

@section('template_title')
Becado
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Lista de becados') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('becados.create') }}" class="btn btn-outline-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Agregar Nuevo Becado') }}
                            </a>
                            <a class="btn btn-outline-primary btn-sm float-right" data-placement="left"
                                href="{{ route('documentos.create') }}">
                                {{ __('Subir documento') }}</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">


                    <div class="table-responsive">
                        <table id="Table" class="table table-striped  table-condensed table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Teléfono de Contacto y Correo Electrónico</th>

                                    <th>Fecha de inicio de beca</th>


                                    <th>Programa de beca </th>
                                    <th>Lugar de servicio</th>
                                    <th>Status</th>
                                    <th>Foto </th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($becados as $becado)




                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $becado->nombre }} {{ $becado->ApellidoP }} {{ $becado->ApellidoM }}</td>
                                    </td>
                                    <td>{{\Carbon\Carbon::createFromDate($becado->fecha)->age;}}

                                        <slot> Años</slot>
                                    </td>
                                    <td>{{ $becado->TelefonoC  }}<br>{{ $becado->Correo }} </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($becado->Anoiniciobeca)->Locale('es')->formatLocalized(' %B %Y')}}




                                    </td>


                                    <td>{{ $becado->programa->nombre}}</td>
                                    <td>{{ $becado->servicio->nombre }}</td>
                                    <td>{{ $becado->status }}
                                        <br>
                                        {{"("}}
                                        {{ \Carbon\Carbon::parse($becado->Anoiniciobeca)->Locale('es')->formatLocalized(' %B %Y')}}
                                        {{" a"}}
                                        {{ \Carbon\Carbon::parse($becado->AnodeGraduacion)->Locale('es')->formatLocalized(' %B %Y')}}
                                        {{")"}}
                                    </td>
                                    <td class="d-flex justify-content-center ">
                                        <img src=" {{ asset('fotos/'.$becado->Foto_path) }}" height="96px" width="80px"
                                            class="rounded-circle">
                                    </td>



                                    <td class="align-middle" class="d-flex justify-content-center">


                                        <a class=" btn btn-sm btn-primary "
                                            href=" {{ route('becados.show',$becado->id) }}"><i
                                                class="fa fa-fw fa-eye"></i>Mostrar </a>


                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-4">
            <div class="card card-chart">
                <div class="card-header  d-flex justify-content-between">
                    <h5 class="card-category">Total de becados </h5>
                    <h5 class="fw-bold"> {{$becadost}}</h5>


                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 m-4">
            <div>
                <button type="button" class="btn btn-outline-primary">
                    <a class="dropdown-item" target="_blank" href="{{ route('fechan')}}">Listado de becados con fecha de
                        nacimiento</a>
                </button>

            </div>
            <div class="col-sm-12 mt-2">

                <div class="input-group mb-2">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button"
                        value="Reporte de becados por estatus" disabled readonly>
                    <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">seleccione un estatus
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end  bg-white">
                        @foreach ($estatus as $item)
                        <li><a class="dropdown-item" target="_blank" href="{{ route('estatus',$item) }}">
                                {{ $item }} </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endforeach
                </div>
            </div>
            <div class="col-sm-12">
                <form method="post" target="_blank" action="{{ route('graduados') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">


                        <input type="text" class="form-control" aria-label="Text input with input"
                            value="Reporte de graduados por año" disabled readonly>
                        <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                        <button class="btn btn-outline-primary" type="submit">
                            Generar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <form method="post" target="_blank" action="{{ route('graduadosf') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">

                        <input type="text" class="form-control" aria-label="Text input with input"
                            value="Reporte de graduados por año con foto" disabled readonly>
                        <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                        <button class="btn btn-outline-primary" type="submit">
                            Generar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <form method="post" target="_blank" action="{{ route('anoiniciobeca') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" aria-label="Text input with input"
                            value="Reporte de becados por año de entrada en la beca" disabled readonly>
                        <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                        <button class="btn btn-outline-primary" type="submit">
                            Generar
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('myChart');
const cdata = JSON.parse('<?php echo $becadosc; ?> ')

let becadosl = cdata.map(obj => obj.status);



let becados = cdata.map(obj => obj.total);
console.log(becados);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: becadosl,
        datasets: [{
            label: ['Becados'],
            data: becados,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
$('#Table').DataTable({
    language: {
        "lengthMenu": "Mostrar   _MENU_   registros ",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing": "Procesando...",
    },
    "lengthMenu": [
        [2, -1, 50, 10, 5, 1],
        [2, "All", 50, 10, 5, 1]
    ],
    dom: '<"top"lf>rt<"bottom"pi><"clear">',
    responsive: "true",
    buttons: [{
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success'
    }, ],
});
</script>
</div>
@endsection