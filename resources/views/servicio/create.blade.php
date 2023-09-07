@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Servicio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Crear') }} Servicio</span>
                    <a class="btn btn-primary btn-sm float-right" data-placement="left"
                        href="{{ route('servicios.index') }}">
                        {{ __('Regresar') }}</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('servicios.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('servicio.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection