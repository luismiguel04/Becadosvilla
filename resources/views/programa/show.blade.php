@extends('layouts.app')

@section('template_title')
{{ $programa->name ?? "{{ __('Show') Programa" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrando ') }} Programa</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('programas.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombre del programa:</strong>
                        {{ $programa->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $programa->status }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection