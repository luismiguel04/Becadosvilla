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
                            {{ __('Reporte de solicitud de dinero por año por programa') }}
                        </span>
                    </div>
                    <div><a class="btn btn-primary btn-sm float-right" data-placement="left"
                            href="{{ route('gastos.index') }}">
                            {{ __('Regresar') }}</a>

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



                        <form method="POST" action="{{ route('gastoprogramaanual') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <label for="progrma_id" class="form-control"> Fecha del reporte
                                </label>
                                <input type="date" name="fechap" id="fechap" class="form-control" required>
                                <label for="nombre" class="form-control"> Nombre de la firma
                                </label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <label for="nombre" class="form-control"> Beginning Fund Date
                                </label>
                                <input type="date" name="begfod" id="begfod" class="form-control" required>
                                <label for="nombre" class="form-control"> Monto Pesos
                                </label>
                                <input type="text" name="begfom" id="begfom" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="nombre" class="form-control"> Add: Fund Received Date
                                </label>
                                <input type="date" name="addfod" id="addfod" class="form-control" required>
                                <label for="nombre" class="form-control"> Monto Pesos
                                </label>
                                <input type="text" name="addfom" id="addfom" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <label for="nombre" class="form-control"> Add: Interest Earned

                                </label>
                                <input type="text" name="interes" id="interes" class="form-control" required>
                                <label for="nombre" class="form-control"> Tipo de cambio

                                </label>
                                <input type="text" name="tc" id="tc" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">

                                <select name="programa_id" id="programa_id" class="form-select" required>
                                    <option value=''>Seleccionar programa</option>
                                    @foreach ($programas as $item)

                                    <option value="{{ $item->id }}">
                                        {{ $item->nombre }}
                                    </option>

                                    @endforeach
                                </select>
                                <input type="number" placeholder="escriba un año " name="fecha" id="fecha" min="2019"
                                    value="2019">
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










@endsection