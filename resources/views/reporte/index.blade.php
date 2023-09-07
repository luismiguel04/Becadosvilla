@extends('layouts.app')

@section('template_title')
Programa
@endsection

@section('content')

<head>

</head>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Reportes') }}
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">

                    @csrf

                    <div class="row">
                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button" value="Perfil de becario" disabled readonly>
                                <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">seleccione un becado</button>
                                <ul class="dropdown-menu dropdown-menu-end  bg-white">
                                    @foreach ($becados as $becado)
                                    <li><a class="dropdown-item" target="_blank" href="{{ route('perfil',$becado->id) }}">
                                            {{ $becado->nombre }}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button" value="Reporte de becados por programa" disabled readonly>
                                <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">seleccione por
                                    programa</button>
                                <ul class="dropdown-menu dropdown-menu-end  bg-white">
                                    @foreach ($programas as $item)
                                    <li><a class="dropdown-item" target="_blank" href="{{ route('programa',$item->id) }}">
                                            {{ $item->nombre }}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button" value="Reporte de becados por lugar de servicios" disabled readonly>
                                <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">seleccione un lugar de servicio
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end  bg-white">
                                    @foreach ($servicios as $item)
                                    <li><a class="dropdown-item" target="_blank" href="{{ route('servicio',$item->id) }}">
                                            {{ $item->nombre }}</a></li>
                                    <li>
                                        <hr class=" dropdown-divider">
                                    </li>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button" value="Reporte de becados por programa con foto" disabled readonly>
                                <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">seleccione por
                                    programa
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end  bg-white">
                                    @foreach ($programas as $item)
                                    <li><a class="dropdown-item" target="_blank" href="{{ route('programaf',$item->id) }}">
                                            {{ $item->nombre }}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button" value="Reporte de becados por estatus" disabled readonly>
                                <button class=" btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">seleccione un estatus
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
                        <div class="col-sm-6">
                            <form method="post" target="_blank" action="{{ route('graduados') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">


                                    <input type="text" class="form-control" aria-label="Text input with input" value="Reporte de graduados por año" disabled readonly>
                                    <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                                    <button class="btn btn-outline-primary" type="submit">
                                        Generar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form method="post" target="_blank" action="{{ route('anoiniciobeca') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">


                                    <input type="text" class="form-control" aria-label="Text input with input" value="Reporte de becados por año de entrada en la beca" disabled readonly>
                                    <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                                    <button class="btn btn-outline-primary" type="submit">
                                        Generar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">


                            <form method="post" target="_blank" action="{{ route('graduadosf') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">

                                    <input type="text" class="form-control" aria-label="Text input with input" value="Reporte de graduados por año con foto" disabled readonly>
                                    <input type="number" min="2019" value="2019" placeholder="escriba un año " name="id" id="id">
                                    <button class="btn btn-outline-primary" type="submit">
                                        Generar
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-6">


                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Listado de becados con fecha de nacimiento" disabled readonly>
                                <button type="button" class="btn btn-outline-primary">
                                    <a class="dropdown-item" target="_blank" href="{{ route('fechan')}}">Generar</a>
                                </button>



                            </div>
                        </div>

                        <div class="col-sm-8">

                            <div class="input-group mb-6">

                                <form method="POST" action="{{ route('gastosporano') }}">
                                    @csrf
                                    <label for="becado_id"> Gastos individuales por año
                                    </label>
                                    <div class="input-group mb-3">

                                        <select name="becado_id" id="becado_id" class="form-select">
                                            <option>Seleccione un becado</option>
                                            @foreach ($becados as $becado)

                                            <option value="{{ $becado->id }}">
                                                {{ $becado->nombre }} {{ $becado->ApellidoM }} {{ $becado->ApellidoP }}
                                            </option>

                                            @endforeach
                                        </select>
                                        <input type="number" value="2022" min="2019" placeholder="escriba un año " name="ano" id="ano">
                                        <button type="submit" target="_blank" class="btn btn-primary">
                                            {{ __('Generar') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-sm-8">

                            <div class="input-group mb-6">

                                <form method="POST" action="{{ route('gastoprograma') }}">
                                    @csrf
                                    <label for="progrma_id"> Reporte de solicitud de dinero por mes por programa
                                    </label>
                                    <div class="input-group mb-3">

                                        <select name="programa_id" id="programa_id" class="form-select">
                                            <option>Seleccionar programa</option>
                                            @foreach ($programas as $item)

                                            <option value="{{ $item->id }}">
                                                {{ $item->nombre }}
                                            </option>

                                            @endforeach
                                        </select>
                                        <input type="month" placeholder="escriba un año " name="fecha" id="fecha">
                                        <button type="submit" target="_blank" class="btn btn-primary">
                                            {{ __('Generar') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection