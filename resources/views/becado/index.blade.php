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



                                    <td>
                                        <form action="{{ route('becados.destroy',$becado->id) }}" class="formEliminar"
                                            method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('becados.show',$becado->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            <br>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('becados.edit',$becado->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i></a><br>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            {!! $becados->links() !!}
        </div>
    </div>
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
            [-1, 50, 10, 5, 2, 1],
            ["All", 50, 10, 5, 2, 1]
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

    (function() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {

                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: 'Eliminar becado',
                        text: "Esta seguro de eliminar el becado seleccionado!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar becado!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'El becado ha sido borrado exitosamente.',
                                'success'
                            )
                        }
                    })
                }, false)
            })
    })()
    </script>
</div>
@endsection