<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre del programa') }}
            {{ Form::text('nombre', $programa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('status') }}
            <select name="status" id="status" class="form-select" required>
                @if(old('status',$programa->status==''))
                <option value=''>Seleccionar status</option>
                @else
                <option value="{{old('status',$programa->status)}}">{{$programa->status}} {{"selecionado"}}
                    @endif

                <option value="{{'activo'}}">{{"Activo"}}</option>
                <option value="{{'inactivo'}}">{{"Inactivo"}}</option>
            </select>
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>