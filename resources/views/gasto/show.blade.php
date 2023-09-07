@extends('layouts.app')

@section('template_title')
{{ $gasto->name ?? "{{ Gasto".$gasto->fecha }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrando') }} Gasto</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('gastos.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{\Carbon\Carbon::parse($gasto->fecha)->format('m-Y') }}
                    </div>
                    <table id="detalles" class="table  table-striped  table-hover ">
                        <thead style="text-align: center;">
                            <th>Becado</th>
                            <th>Programa</th>
                            <th>Monto</th>
                        </thead>
                        <tbody>
                            @foreach($detalle as $detall)
                            <tr>
                                <td> {{ $detall->becado->nombre }}
                                    {{ $detall->becado->ApellidoP }}
                                    {{ $detall->becado->ApellidoM }}
                                </td>
                                <td> {{ $detall->becado->programa->nombre }}</td>
                                <td>
                                    <slot> $</slot>{{ number_format($detall->Monto, 2, ".", ",") }} mxn.
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <th colspan="2">
                                <h5 style="font-weight:bold;">Total
                                </h5>
                            </th>
                            <th>

                                <h5 style="font-weight:bold;">



                                    MNX $

                                    {{ number_format($total, 2, ".", ",") }}


                                </h5>



                            </th>




                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection