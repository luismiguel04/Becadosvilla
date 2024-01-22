@extends('layouts.app')

@section('template_title')
{{ $programa->name ?? "{{ __('Show') Programa" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="d-flex justify-content-between border-bottom border-4 border-primary pb-2">
                    <p class=" h3 m-2"> {{ $programa->nombre }}</p>
                    <div class="float-right m-2">
                        <a class="btn btn-primary" href="{{ route('programas.index') }}"> {{ __('Regresar') }}</a>
                    </div>

                </div>

                <div class="card-body">


                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $programa->status }}
                    </div>

                    <a class="btn btn-primary btn-sm float-right" data-placement="left" target="_blank"
                        href="{{ route('programa',$programa->id) }}">
                        {{ __(' Lista de Becados') }}</a>
                    <a class="btn btn-primary btn-sm float-right" data-placement="left" target="_blank"
                        href="{{ route('programaf',$programa->id) }}">
                        {{ __(' Lista de Becados con foto') }}</a>
                    <a class="btn btn-primary btn-sm float-right" data-placement="left" target="_blank"
                        href="{{ route('programafano',$programa->id) }}">
                        {{ __(' Listado de Becados') }}</a>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection