@extends('layouts.app')

@section('template_title')
{{ __('Actualizar') }} Gasto
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Actualizar') }} Gasto</span>
                    <a class="btn  btn btn-primary btn-sm float-right" data-placement="left"
                        href="{{ route('gastos.index') }}">
                        {{ __('Regresar') }}</a>

                </div>
                <div class="card-body">
                    @include('gasto.searche')
                    <form method="POST" action="{{ route('gastos.update', $gasto->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('gasto.forme')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#bt_add').click(function() {
        agregar();
    });
});

var cont = 0;
total = 0;
subtotal = [];
/* $("#guardar").hide(); */

function agregar() {
    pidbecado = $("#pidbecado").val();
    becado = $("#pidbecado option:selected").text();
    Monto = $("#PMonto").val();

    subtotal[cont] = (Monto * 1);
    total = total + subtotal[cont];

    var fila = '<tr class="selected" id="fila' + cont +
        '"> <td><button type="button"  class="btn btn-warning" onclick="eliminar(' +
        cont + ');">x</button></td><td><input type="hidden" id="becado_id" name="becado_id[]" value=' +
        pidbecado +
        '>' + becado +
        '</td><td><input type="number" name="Monto[]" id="Monto" value=' + Monto + ' multiple ></td></tr>';
    cont++;



    limpiar();
    $("#pidbecado").focus();
    $("#total").html("$ MXN " + total);
    /*    evaluar(); */
    $('#detalles').append(fila);


    console.log(becado_id);

}

function limpiar() {
    $("#PMonto").val('');

}

/*   function evaluar() {
      if (total > 0) {
          $("#guardar").show();
      } else {
          $("#guardar").hide();
      }

  } */

function eliminar(index) {
    total = total - subtotal[index];
    $("#total").html("$ MXN " + total);
    $("#fila" + index).remove();
    /*         evaluar(); */
}
</script>

@endsection