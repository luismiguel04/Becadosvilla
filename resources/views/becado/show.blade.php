@extends('layouts.app')

@section('template_title')
{{$becado->name ?? "{{ __('Show') Becado" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">{{ __('Mostrando ') }} Becado: <strong>{{ $becado->nombre }}
                                {{ $becado->ApellidoP }} {{ $becado->ApellidoM }}</strong></span>

                        <a class="btn btn-primary btn-sm float-right" data-placement="left"
                            href="{{ route('becados.index') }}">
                            {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <div style="display: flex; justify-content:center;">
                                        <strong>Datos
                                            Personales</strong>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong>Nombre:</strong>
                                            {{ $becado->nombre.' '.$becado->ApellidoP.' '.$becado->ApellidoM }}
                                        </div>
                                        <div>
                                            <strong>
                                                Edad:</strong>
                                            {{\Carbon\Carbon::createFromDate($becado->fecha)->age;}}

                                            <slot>Años</slot>
                                        </div>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong>Fecha de nacimiento:</strong>

                                            {{ \Carbon\Carbon::parse($becado->fecha)->format('d/m/Y')}}


                                        </div>
                                        <div>
                                            <strong> Lugar de Nacimiento:</strong>
                                            {{ $becado->LugarN }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Dirección Permanente:</strong>

                                        {{ $becado->DireccionP }}
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Dirección Actual:</strong>

                                        {{ $becado->DireccionA }}
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong>Teléfono Celular:</strong>
                                            {{ $becado->TelefonoC }}
                                        </div>
                                        <div>
                                            <strong>Correo Electrónico:</strong>
                                            {{ $becado->Correo }}
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <strong>Padre:</strong>
                                        {{ $becado->NombreP }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Madre:</strong>
                                        {{ $becado->NombreM }}
                                    </div>

                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong>Número de hermanos:</strong>
                                            {{ $becado->NumHermanos }}
                                        </div>
                                        <div>
                                            <strong>Lugar que ocupa en la familia:</strong>
                                            {{ $becado->LugarFam }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Año de Entrada a Villa:</strong>
                                        {{ $becado->AnoEntradaVilla }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Año de Graduación de secundaria:</strong>
                                        {{ $becado->AnoGradSec }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Dirección de la Universidad:</strong>
                                        {{ $becado->DireccionUni }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Año de Graduación de bachillerato:</strong>
                                        {{ $becado->AnoGradBach }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Trabajo actual:</strong>
                                        {{ $becado->TrabajoAct }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Facebook:</strong>
                                        {{ $becado->Facebook }}
                                        <strong>Instagram:</strong>
                                        {{ $becado->Instagram }}
                                        <strong>Otra red:</strong>
                                        {{ $becado->OtraRed }}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content:center;"> <strong>Datos Sobre la
                                                    Beca</strong>
                                            </div>
                                        </div>


                                        <div class="card-body">
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
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content:center;"> <strong>Foto</strong>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: flex; justify-content:center;">


                                            <img height="96px" width="72px"
                                                src="  http://localhost/becadosvilla/storage/app/images/{{$becado->Foto_path}}">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <br>
                                    <div class="card">
                                        <div class="card-header">
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <strong> Documentos</strong>
                                                <a class="btn btn-primary btn-sm float-right" data-placement="left"
                                                    href="{{ route('documentos.create',$becado->id) }}">
                                                    {{ __('Subir documento') }}</a>

                                            </div>
                                        </div>
                                        <div class="card-body">
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

                                                        <div class="modal fade"
                                                            id="vistaprevia{{$documento->Foto_path}}" tabindex="-1"
                                                            aria-labelledby="vistaprevia" aria-hidden="true">
                                                            <div class="modal-dialog modal-fullscreen-sm-down">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="vistaprevia">
                                                                            Modal title</h5>
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