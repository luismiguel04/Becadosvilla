@extends('layouts.app')

@section('template_title')
{{ $servicio->name ?? "{{ __('Show') Servicio" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrando ') }} Servicio</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('servicios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombre del lugar de servicio:</strong>
                        {{ $servicio->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $servicio->status }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection