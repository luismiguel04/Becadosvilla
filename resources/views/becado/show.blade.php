@extends('layouts.app')

@section('template_title')
{{$becado->name ?? "{{ __('Show') Becado" }}
@endsection

@section('content')
<section class="content container-fluid  ">
    <div class="row ">
        <div class="col-12  ">
            <div class="card ">

                <div class="d-flex justify-content-between align-items: center m-3 ">
                    <div class="d-flex justify-content-center">
                        <span>{{ __('Mostrando ') }} Becado: <strong>{{ $becado->nombre }}
                                {{ $becado->ApellidoP }} {{ $becado->ApellidoM }}</strong></span>
                    </div>
                    <div>
                        <form method="POST" target="_blank" action="{{ route('gastosporano') }}">
                            @csrf
                            <label for="becado_id">Gastos por Año
                            </label>
                            <input type="hidden" value="{{$becado->id}}" name="becado_id" id="becado_id">
                            <input type="number" value="2022" min="2019" placeholder="escriba un año " name="ano"
                                id="ano">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Generar') }}
                            </button>

                        </form>
                    </div>
                    <div><a class="btn btn-primary btn-sm float-right" data-placement="left"
                            href="{{ route('becados.index') }}">
                            {{ __('Regresar') }}</a>

                    </div>


                </div>

                <div class="card-body h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card h-100 ">

                                <div class=" card-body ms-3">
                                    <div
                                        class="d-flex justify-content-center border-bottom border-4 border-primary mb-3">
                                        <p class="h3">Datos
                                            Personales</p>
                                    </div>

                                    <div class="d-flex justify-content-between">


                                        <div class="d-flex ">
                                            <p class="fs-6 fw-bold">Nombre:</p>

                                            {{ $becado->nombre.' '.$becado->ApellidoP.' '.$becado->ApellidoM }}

                                        </div>
                                        <div class=" d-flex">
                                            <p class="fw-bold text-start">
                                                Edad:</p>

                                            {{\Carbon\Carbon::createFromDate($becado->fecha)->age;}} Años


                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold ">Fecha de nacimiento:</p>
                                            {{ \Carbon\Carbon::parse($becado->fecha)->format('d/m/Y')}}
                                        </div>
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold"> Lugar de Nacimiento:</p>
                                            {{ $becado->LugarN }}
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <p class=" fs-6 fw-bold">Teléfono Celular:</p>
                                            {{ $becado->TelefonoC }}
                                        </div>
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold">Correo Electrónico:</p>
                                            {{ $becado->Correo }}
                                        </div>

                                    </div>


                                    <div class="d-flex d-flex justify-content-between">
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold">Padre:</p>
                                            {{ $becado->NombreP }}
                                        </div>
                                        <div class="d-flex">

                                            <p class="fs-6 fw-bold">Madre:</p>
                                            {{ $becado->NombreM }}
                                        </div>
                                    </div>

                                    <div class="d-flex d-flex justify-content-between">
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold">Número de hermanos:</p>
                                            {{ $becado->NumHermanos }}
                                        </div>
                                        <div class="d-flex">
                                            <p class="fs-6 fw-bold">Lugar que ocupa en la familia:</p>
                                            {{ $becado->LugarFam }}
                                        </div>
                                    </div>
                                    <div class="d-flex d-flex">
                                        <p class="fs-6 fw-bold">Año de Entrada a Villa:</p>
                                        {{ $becado->AnoEntradaVilla }}
                                    </div>
                                    <div class="d-flex d-flex ">
                                        <p class="fs-6 fw-bold">Año de Graduación de secundaria:</p>
                                        {{ $becado->AnoGradSec }}
                                    </div>
                                    <div class="d-flex d-flex ">
                                        <p class="fs-6 fw-bold">Dirección de la Universidad:</p>
                                        {{ $becado->DireccionUni }}
                                    </div>
                                    <div class="d-flex d-flex ">
                                        <p class="fs-6 fw-bold">Año de Graduación de bachillerato:</p>
                                        {{ $becado->AnoGradBach }}
                                    </div>
                                    <div class="d-flex d-flex ">
                                        <p class="fs-6 fw-bold">Trabajo actual:</p>
                                        {{ $becado->TrabajoAct }}
                                    </div>
                                    <div class="d-flex d-flex justify-content-between">
                                        <p class="fs-6 fw-bold">Facebook:</p>
                                        {{ $becado->Facebook }}
                                        <p class="fs-6 fw-bold">Instagram:</p>
                                        {{ $becado->Instagram }}
                                        <p class="fs-6 fw-bold">Otra red:</p>
                                        {{ $becado->OtraRed }}
                                    </div>
                                    <div>
                                        <p class="fs-6 fw-bold">Dirección Permanente:</p>
                                        <p> {{ $becado->DireccionP }}</p>

                                    </div>
                                    <div>

                                        <p class="fs-6 fw-bold">Dirección Actual:</p>

                                        <p> {{ $becado->DireccionA }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row d-flex">
                                <div class="col-md-10">
                                    <div class="card h-100 ">



                                        <div class="card-body">
                                            <div
                                                class="d-flex justify-content-center border-bottom border-4 border-primary mb-3">
                                                <p class="h3">Datos Sobre la
                                                    Beca</p>
                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">

                                                <div>
                                                    <strong>Carrera:</strong>
                                                    {{ $becado->Carrera }}
                                                </div>
                                                <div>
                                                    <strong>Universidad:</strong>
                                                    {{ $becado->Universidad }}
                                                </div>
                                            </div>
                                            <div style="display: flex; justify-content: space-between; align-items:
                                                center;">
                                                <div>
                                                    <strong>Banco:</strong>
                                                    {{ $becado->Banco }}
                                                </div>
                                                <div>
                                                    <strong>Cuenta Bancaria:</strong>
                                                    {{ $becado->CuentaBanc }}
                                                </div>
                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">

                                                <div>
                                                    <strong>Año de inicio en la beca:</strong>
                                                    {{\carbon\Carbon::parse($becado->Anoiniciobeca)->format('d-m-y') }}
                                                </div>
                                                <div class="form-group">
                                                    <strong>Sistema:</strong>
                                                    {{ $becado->Sistema }}
                                                </div>
                                            </div>

                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <div class="form-group">

                                                    <strong>Fecha estimada de graduación:</strong>

                                                    {{ \Carbon\Carbon::parse($becado->Duracion)->format('d/m/Y')}}
                                                </div>

                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <div class="form-group">
                                                    <strong>Año de Graduación:</strong>
                                                    {{ $becado->AnodeGraduacion }}
                                                </div>
                                                <div class="form-group">
                                                    <strong>Fecha de Baja en la beca:</strong>
                                                    {{ $becado->FechadeBaja }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Logros Recibidos:</strong>
                                                    {{ $becado->Logros_recibidos }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Status:</strong>
                                                    {{ $becado->status }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Programa:</strong>
                                                    {{ $becado->programa->nombre }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Servicio:</strong>
                                                    {{ $becado->servicio->nombre }}
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-2   ">

                                    <!-- <div class="card h-100"> -->

                                    <div class="card-body h-100 d-flex justify-content-center">



                                        <div>
                                            <img src="  http://localhost/becadosvilla/storage/app/images/{{$becado->Foto_path}} "
                                                class="rounded-circle border  border-gray border-5 mb-3" height="100px"
                                                width="90px">

                                            <a class="btn btn-primary btn-sm float-right mb-1" data-placement="left"
                                                target="_blank" href="{{ route('perfil',$becado->id) }}">
                                                {{ __('Perfil') }}</a>
                                            <a class="btn btn-primary btn-sm float-right" data-placement="left"
                                                target="_blank" href="{{ route('gastoacumulado',$becado->id) }}">
                                                {{ __('Gastos') }}</a>
                                        </div>
                                    </div>


                                    <!--  </div> -->
                                </div>



                            </div>


                            <div class=" col-md-12  h-100%">
                                <br>
                                <div class="card">



                                    <div class="card-body">
                                        <div
                                            class="d-flex justify-content-between border-bottom border-4 border-primary pb-2">
                                            <p class=" h3"> Documentos</p>
                                            <a class=" btn btn-primary btn-sm float-right" data-placement="left"
                                                href="{{ route('documentos.create',$becado->id) }}">
                                                {{ __('Subir documento') }}</a>

                                        </div>
                                        <table class="table  overflow: auto;">
                                            <tr>

                                                <th>Nombre del archivo</th>
                                                <th>Vista Previa</th>

                                                <th>Ver

                                                </th>
                                                <th>

                                                </th>
                                                <th>Eliminar</th>
                                            </tr>
                                            @foreach ($documentos as $documento)
                                            <tr>
                                                <th>{{$documento->nombre}}</th>
                                                <th>
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#vistaprevia{{$documento->Foto_path}}"><i
                                                            class="fa fa-fw fa-eye"></i></a>

                                                    <div class="modal fade" id="vistaprevia{{$documento->Foto_path}}"
                                                        tabindex="-1" aria-labelledby="vistaprevia" aria-hidden="true">
                                                        <div class="modal-dialog modal-fullscreen-sm-down">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <iframe
                                                                        src="http://localhost/becadosvilla/storage/app/documentos/{{$documento->Foto_path}}"
                                                                        &embedded=true"
                                                                        style="width:100%; height:700px;"
                                                                        frameborder="0"></iframe>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </th>
                                                <th><a target="_blank"
                                                        href="http://localhost/becadosvilla/storage/app/documentos/{{$documento->Foto_path}}">Ver</a>

                                                <th>
                                                <th>

                                                    <form action="{{ route('documentose',$documento->id) }}"
                                                        class="formEliminar" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> </button>
                                                    </form>
                                                </th>
                                            </tr>

                                            @endforeach
                                        </table>
                                        <table class=" table table table-hover table-striped table-sm">
                                            <thead class=" thead  align-top">
                                                <tr>
                                                    <th>Año</th>
                                                    @foreach(array_keys($datos) as $ano)
                                                    <th>{{ $ano }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <th>Total Anual</th>
                                                    @foreach(array_keys($datos) as $ano)
                                                    <th style="text-align:center;">
                                                        <slot>$</slot>
                                                        {{ number_format($totalesAnuales[$ano], 2, ".", ",") }}
                                                    </th>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th COLSPAN="{{$colt}}" scope="row" style="text-align:center;">Monto
                                                        Total

                                                        <slot>$</slot>{{number_format($total, 2, ".", ",") }}
                                                    </th>


                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>


                                </div>
                                <div class="d-flex align-items-end flex-column mb-3"
                                    style="height: 200px; padding-top:10px;">

                                    <a class="btn btn-sm btn-success mb-2"
                                        href="{{ route('becados.edit',$becado->id) }}"> Editar <i
                                            class="fa fa-fw fa-edit"></i></a>


                                    <form action="{{ route('becados.destroy',$becado->id) }}" class="formEliminarb"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"> Eliminar <i
                                                class="fa fa-fw fa-trash"> </i> </button>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>

    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {

                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: 'Eliminar documento',
                        text: "Esta seguro de eliminar el docuemento seleccionado!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar el documento!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'El documento ha sido borrado exitosamente.',
                                'success'
                            )
                        }
                    })
                }, false)
            })
    })()
    </script>
    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminarb')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {

                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: 'Eliminar becado',
                        text: "Esta seguro de eliminar el becado seleccionado para eliminarlo es necesario asegurarse que el becado no tenga ningun registro ya que afectara en la base de datos! si desea darlo de baja cambien el status a baja.",
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
</section>
@endsection