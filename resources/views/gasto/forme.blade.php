<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">




                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="gasto" name="gasto"
                                    value="{{$gasto->id}}">
                                <label for="fecha">{{ __('Fecha de solicitud') }}</label>

                                <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha"
                                    id="fecha" type="date" value="{{ old('fecha',$gasto->fecha )}}" required />
                                @if ($errors->has('fecha'))
                                <span id="fecha-error" class="error text-danger"
                                    for="input-fecha">{{ $errors->first('fecha') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-5">
                            <div class="from-group">
                                <label for="pidbecado">Becado</label>
                                <select name="pidbecado" class="form-control choices-single" id="pidbecado">
                                    <option selected disabled value="">Seleccionar Becado
                                    </option>
                                    @foreach($becados as $becado)
                                    <option value="{{$becado->id}}">
                                        {{$becado->nombre.' '.$becado->ApellidoP. ' '.$becado->ApellidoM}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="PMonto">Monto</label>
                                <input type="number" class="form-control" id="PMonto" name="PMonto">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">

                                <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <br>
                            <table class="table  table-striped table-bordered table-condensed table-hover ">
                                <thead>
                                    <th style="background-color:#ff66FF">Opciones</th>
                                    <th style="background-color:#ff66FF">Becado</th>
                                    <th style="background-color:#ff66FF">Monto</th>
                                </thead>
                                <tbody>
                                    @foreach ($detalle as $detall)
                                    <tr>
                                        <td>
                                            <!--     <form action="{{ route('eliminar',$detall->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE') -->
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('eliminar',$detall->id) }}"><i
                                                    class="fa fa-fw fa-trash"></i>
                                                {{ __('Eliminar') }}</a>
                                            <!--  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> -->
                                            <!--  </form> -->
                                        </td>
                                        <td>
                                            {{$detall->Becado->nombre}} {{$detall->Becado->ApellidoP}}
                                            {{$detall->Becado->ApellidoM}}
                                        </td>
                                        <td>
                                            MNX $ {{ number_format($detall->Monto, 2, ".", ",") }}

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <th>Total</th>
                                    <th>

                                    </th>
                                    <th>
                                        <h5>

                                            MNX $

                                            {{ number_format($total, 2, ".", ",") }}
                                        </h5>
                                    </th>

                                </tfoot>
                            </table>
                            <table id="detalles"
                                class="table  table-striped table-bordered table-condensed table-hover ">
                                <thead>
                                    <tr>
                                        <th colspan="3"> AGREGAR</th>
                                    </tr>
                                    <th style="background-color:#ff66FF">Opciones</th>
                                    <th style="background-color:#ff66FF">Becado</th>
                                    <th style="background-color:#ff66FF">Monto</th>
                                </thead>
                                <tbody>

                                    <tr>

                                    </tr>


                                </tbody>

                                <tfoot>
                                    <th>Total</th>
                                    <th>

                                    </th>
                                    <th>
                                        <h5 id="total">

                                            MNX $ 0.00</h5>
                                    </th>

                                </tfoot>
                            </table>





                        </div>




                    </div>
                </div>
            </div>






        </div>
    </div>


    <div class="box-footer mt20" id="guardar">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>

</div>