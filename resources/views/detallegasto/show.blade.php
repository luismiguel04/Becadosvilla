@extends('layouts.app')

@section('template_title')
    {{ $detallegasto->name ?? "{{ __('Show') Detallegasto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detallegasto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detallegastos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Becado Id:</strong>
                            {{ $detallegasto->becado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $detallegasto->Monto }}
                        </div>
                        <div class="form-group">
                            <strong>Gasto Id:</strong>
                            {{ $detallegasto->gasto_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
