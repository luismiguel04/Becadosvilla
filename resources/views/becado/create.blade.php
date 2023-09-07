@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Becado
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Crear') }} Becado</span>
                    <a class="btn btn-primary btn-sm float-right" data-placement="left"
                        href="{{ route('becados.index') }}">
                        {{ __('Regresar') }}</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('becados.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('becado.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection