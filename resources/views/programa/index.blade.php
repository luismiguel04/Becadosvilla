@extends('layouts.app')

@section('template_title')
Programa
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Programas de Becas Villa de los Niños') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('programas.create') }}" class=" btn btn-outline-primary"
                                data-placement="left">
                                {{ __('Crear nuevo programa') }}
                            </a>
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
                        <table class="table table-striped table-hover" id="Table">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre del programa</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programas as $programa)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $programa->nombre }}</td>
                                    <td>{{ $programa->status}}</td>

                                    <td>
                                        <form action="{{ route('programas.destroy',$programa->id) }}"
                                            class="formEliminar" method="POST">
                                            <!-- <a class="btn btn-sm btn-primary "
                                                href="{{ route('programas.show',$programa->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a> -->
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('programas.edit',$programa->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash" onclick="alert"></i>
                                                {{ __('Eliminar') }}</button>

                                        </form>



                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
            {!! $programas->links() !!}
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
            [-1, 50, 10, 5, 2],
            ["All", 50, 10, 5, 2]
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



    (function alert() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {

                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: 'Eliminar programa de beca',
                        text: "Esta seguro de eliminar el programa de beca selecionado!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar programa!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'El programa ha sido borrado exitosamente.',
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