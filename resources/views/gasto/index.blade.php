@extends('layouts.app')

@section('template_title')
Gasto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Gastos Mensuales') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('gastos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Crear Nuevo') }}
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
                        <table id="Table" class="table  table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>


                                    <th>Mes/Año</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gastos as $gasto)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($gasto->fecha)->formatLocalized(' %B %Y')}}
                                    </td>




                                    <td>
                                        <form action="{{ route('gastos.destroy',$gasto->id) }}" class="formEliminar"
                                            method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('gastos.show',$gasto->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('gastos.edit',$gasto->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class>
                                <td>
                                    TOTAL
                                </td>
                                <td>

                                </td>
                                <td>
                                    <slot>$</slot>{{ number_format($total, 2, ".", ",") }}

                                </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {!! $gastos->links() !!}
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
            [-1, 50, 10, 5],
            ["All", 50, 10, 5]
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
                        title: 'Eliminar Gasto',
                        text: "Esta seguro de eliminar el gasto seleccionado! una vez eliminado se perderan todos los montos asociados a este gasto",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar gasto!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'El gasto ha sido borrado exitosamente.',
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