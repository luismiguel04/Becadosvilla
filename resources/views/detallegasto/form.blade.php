<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('becado_id') }}
            {{ Form::text('becado_id', $detallegasto->becado_id, ['class' => 'form-control' . ($errors->has('becado_id') ? ' is-invalid' : ''), 'placeholder' => 'Becado Id']) }}
            {!! $errors->first('becado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Monto') }}
            {{ Form::text('Monto', $detallegasto->Monto, ['class' => 'form-control' . ($errors->has('Monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('Monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gasto_id') }}
            {{ Form::text('gasto_id', $detallegasto->gasto_id, ['class' => 'form-control' . ($errors->has('gasto_id') ? ' is-invalid' : ''), 'placeholder' => 'Gasto Id']) }}
            {!! $errors->first('gasto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>