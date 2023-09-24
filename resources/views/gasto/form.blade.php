<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group" id="ffecha">

                                <label for="fecha">{{ __('Fecha de solicitud') }}</label>

                                <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha"
                                    id="fecha" type="month" placeholder="{{ __('Fecha de nacimiento') }}"
                                    value="{{ old('fecha',$gasto->fecha) }}" required />
                                @if ($errors->has('fecha'))
                                <span id="fecha-error" class="error text-danger"
                                    for="input-fecha">{{ $errors->first('fecha') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="from-group" id="fbecado">
                                <label for="pidbecado">Becado</label>
                                <select name="pidbecado" class="form-control choices-single" id="pidbecado">
                                    <option selected disabled value="">Seleccionar Becado</option>
                                    @foreach($becados as $becado)
                                    <option value="{{$becado->id}}">
                                        {{$becado->nombre.' '.$becado->ApellidoP. ' '.$becado->ApellidoM}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group" id="fmonto">
                                <label for="PMonto">Monto</label>
                                <input type="number" class="form-control" id="PMonto" name="PMonto">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group" id="fagregar">
                                <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <table id="detalles"
                                class="table  table-striped table-bordered table-condensed table-hover ">
                                <thead>
                                    <th class="bg-success text-white text-center">Opciones</th>
                                    <th class="bg-success text-white text-center">Becado</th>
                                    <th class="bg-success text-white text-center">Monto</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th>Total</th>
                                    <th>

                                    </th>
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
    <div class="box-footer mt20" id="guardar">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>

</div>