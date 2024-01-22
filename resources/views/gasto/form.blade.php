<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group" id="ffecha">

                                <label for="fecha">{{ __('Fecha de solicitud') }}</label>

                                <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" id="fecha" type="month" placeholder="{{ __('Fecha de nacimiento') }}" value="{{ old('fecha',$gasto->fecha) }}" required />
                                @if ($errors->has('fecha'))
                                <span id="fecha-error" class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row justify-content-center">


                                <div class="col-sm-6">
                                    <br>
                                    <table id="detalles" class="table  table-striped table-bordered table-condensed table-hover table-sm ">
                                        <thead>

                                            <th class="bg-success text-white text-center">Becado</th>
                                            <th class="bg-success text-white text-center">Monto</th>
                                        </thead>
                                        <tbody>
                                            @foreach($becados as $becado)

                                            <td>
                                                <input type="hidden" id="becado_id" name="becado_id[]" value="{{$becado->id}}">
                                                {{$becado->nombre.' '.$becado->ApellidoP. ' '.$becado->ApellidoM}}
                                            </td>
                                            <td><input type="number" name="Monto[]" id="Monto" multiple>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>Total</th>

                                            <th>
                                                <h5 id="total">MNX $ 0.00</h5>
                                            </th>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20" id="guardar">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Limpiar</button>
    </div>

</div>