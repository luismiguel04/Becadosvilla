@extends('layouts.app')

@section('template_title')
{{ __('Subir') }} Documento
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row  justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Subir ') }} Documentos</span>
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('becados.index') }}">
                        {{ __('Regresar') }}</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('stores') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('documentos.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection