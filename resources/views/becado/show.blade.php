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
                                        <div class="position-absolute top-0 start-0 translate-middle"><label
                                                class=" rounded bg-primary border-primary border border-3 text-white  fw-bold">
                                                {{ $becado->id }}
                                            </label>
                                        </div>

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
                                                class="rounded-circle border  border-gray border-5" height="100px"
                                                width="90px">
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

                                                <th>

                                                </th>
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
                                            </tr>

                                            @endforeach
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection