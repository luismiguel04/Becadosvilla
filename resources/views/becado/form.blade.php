<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <label>{{ __('Nombre completo') }}</label>
                <div class="input-group">
                    {{ Form::text('nombre', $becado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}


                    {{ Form::text('ApellidoP', $becado->ApellidoP, ['class' => 'form-control' . ($errors->has('ApellidoP') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
                    {!! $errors->first('ApellidoP', '<div class="invalid-feedback">:message</div>') !!}


                    {{ Form::text('ApellidoM', $becado->ApellidoM, ['class' => 'form-control' . ($errors->has('ApellidoM') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
                    {!! $errors->first('ApellidoM', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">





                <div class="form-group">
                    <label>{{ __('Fecha de nacimiento') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha"
                                id="input-fecha" type="date" placeholder="{{ __('Fecha de nacimiento') }}"
                                value="{{ old('fecha',$becado->fecha) }}" required />
                            @if ($errors->has('fecha'))
                            <span id="fecha-error" class="error text-danger"
                                for="input-fecha">{{ $errors->first('fecha') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Lugar de Nacimiento') }}
                    {{ Form::text('LugarN', $becado->LugarN, ['class' => 'form-control' . ($errors->has('LugarN') ? ' is-invalid' : ''), 'placeholder' => 'Lugar de Nacimiento']) }}
                    {!! $errors->first('LugarN', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('Dirección Permanente') }}
                    {{ Form::text('DireccionP', $becado->DireccionP, ['class' => 'form-control' . ($errors->has('DireccionP') ? ' is-invalid' : ''), 'placeholder' => 'Dirección Permanente']) }}
                    {!! $errors->first('DireccionP', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Teléfono Celular') }}
                    {{ Form::text('TelefonoC', $becado->TelefonoC, ['class' => 'form-control' . ($errors->has('TelefonoC') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono Celular']) }}
                    {!! $errors->first('TelefonoC', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('Dirección Actual') }}
                    {{ Form::text('DireccionA', $becado->DireccionA, ['class' => 'form-control' . ($errors->has('DireccionA') ? ' is-invalid' : ''), 'placeholder' => 'Dirección Actual']) }}
                    {!! $errors->first('DireccionA', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-sm-4">


                <div class="form-group">
                    <label>{{ __('Correo Electrónico') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('Correo') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo"
                                id="input-Correo" type="email" placeholder="{{ __('Correo electrónico') }}"
                                value="{{ old('Correo',$becado->Correo) }}" required />
                            @if ($errors->has('Correo'))
                            <span id="Correo-error" class="error text-danger"
                                for="input-Correo">{{ $errors->first('Correo') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Nombre del Padre')}}
                    {{ Form::text('NombreP', $becado->NombreP, ['class' => 'form-control' . ($errors->has('NombreP') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del Padre']) }}
                    {!! $errors->first('NombreP', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Nombre de la Madre') }}
                    {{ Form::text('NombreM', $becado->NombreM, ['class' => 'form-control' . ($errors->has('NombreM') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Madre']) }}
                    {!! $errors->first('NombreM', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label>{{ __('Número de Hermanos') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('NumHermanos') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('NumHermanos') ? ' is-invalid' : '' }}"
                                name="NumHermanos" id="input-NumHermanos" type="number"
                                placeholder="{{ __('Número de Hermanos') }}"
                                value="{{ old('NumHermanos',$becado->NumHermanos) }}" min="0" max=15 required />
                            @if ($errors->has('NumHermanos'))
                            <span id="NumHermanos-error" class="error text-danger"
                                for="input-NumHermanos">{{ $errors->first('NumHermanos') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Lugar que ocupa en la familia') }}
                    {{ Form::text('LugarFam', $becado->LugarFam, ['class' => 'form-control' . ($errors->has('LugarFam') ? ' is-invalid' : ''), 'placeholder' => 'Lugar que ocupa en la familia']) }}
                    {!! $errors->first('LugarFam', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>{{ __('Año de Entrada a Villa') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('AnoEntradaVilla') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('AnoEntradaVilla') ? ' is-invalid' : '' }}"
                                name="AnoEntradaVilla" id="input-AnoEntradaVilla" type="number"
                                placeholder="{{ __('Año de Entrada a Villa') }}"
                                value="{{ old('AnoEntradaVilla',$becado->AnoEntradaVilla) }}" star="2000" min="1998"
                                required />
                            @if ($errors->has('AnoEntradaVilla'))
                            <span id="AnoEntradaVilla-error" class="error text-danger"
                                for="input-AnoEntradaVilla">{{ $errors->first('AnoEntradaVilla') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>{{ __('Graduación secundaria') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('AnoGradSec') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('AnoGradSec') ? ' is-invalid' : '' }}"
                                name="AnoGradSec" id="input-AnoGradSec" type="number"
                                placeholder="{{ __('Año de Graduación de secundaria') }}"
                                value="{{ old('AnoGradSec',$becado->AnoGradSec) }}" star="2000" min="1998" required />
                            @if ($errors->has('AnoGradSec'))
                            <span id="AnoGradSec-error" class="error text-danger"
                                for="input-AnoGradSec">{{ $errors->first('AnoGradSec') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>{{ __('Año de Graduación de bachillerato') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('AnoGradBach') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('AnoGradBach') ? ' is-invalid' : '' }}"
                                name="AnoGradBach" id="input-AnoGradBach" type="number"
                                placeholder="{{ __('Año de Graduación de bachillerato') }}"
                                value="{{ old('AnoGradBach',$becado->AnoGradBach) }}" star="2000" min="1998" required />
                            @if ($errors->has('AnoGradBach'))
                            <span id="AnoGradBach-error" class="error text-danger"
                                for="input-AnoGradBach">{{ $errors->first('AnoGradBach') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Trabajo actual') }}
                    {{ Form::text('TrabajoAct', $becado->TrabajoAct, ['class' => 'form-control' . ($errors->has('TrabajoAct') ? ' is-invalid' : ''), 'placeholder' => 'Trabajo actual']) }}
                    {!! $errors->first('TrabajoAct', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Facebook') }}
                    {{ Form::text('Facebook', $becado->Facebook, ['class' => 'form-control' . ($errors->has('Facebook') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
                    {!! $errors->first('Facebook', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Instagram') }}
                    {{ Form::text('Instagram', $becado->Instagram, ['class' => 'form-control' . ($errors->has('Instagram') ? ' is-invalid' : ''), 'placeholder' => 'Instagram']) }}
                    {!! $errors->first('Instagram', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Otra Red') }}
                    {{ Form::text('OtraRed', $becado->OtraRed, ['class' => 'form-control' . ($errors->has('OtraRed') ? ' is-invalid' : ''), 'placeholder' => 'Otra Red']) }}
                    {!! $errors->first('OtraRed', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Contacto de emergencia') }}
                    {{ Form::text('ContactoEmergencia', $becado->ContactoEmergencia, ['class' => 'form-control' . ($errors->has('ContactoEmergencia') ? ' is-invalid' : ''), 'placeholder' => 'Contacto de Emergencia']) }}
                    {!! $errors->first('ContactoEmergencia', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Telefono de emergencia') }}
                    {{ Form::text('TelefonoEmergencia', $becado->TelefonoEmergencia, ['class' => 'form-control' . ($errors->has('TelefonoEmergencia') ? ' is-invalid' : ''), 'placeholder' => 'Telefono de Emergencia']) }}
                    {!! $errors->first('TelefonoEmergencia', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Carrera') }}
                    {{ Form::text('Carrera', $becado->Carrera, ['class' => 'form-control' . ($errors->has('Carrera') ? ' is-invalid' : ''), 'placeholder' => 'Carrera']) }}
                    {!! $errors->first('Carrera', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Universidad') }}
                    {{ Form::text('Universidad', $becado->Universidad, ['class' => 'form-control' . ($errors->has('Universidad') ? ' is-invalid' : ''), 'placeholder' => 'Universidad']) }}
                    {!! $errors->first('Universidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">

                <div class="form-group">
                    <label>{{ __('Fecha estimada de termino de estudios') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('Duracion') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('Duracion') ? ' is-invalid' : '' }}"
                                name="Duracion" id="Duracion" type="date"
                                placeholder="{{ __('Fecha estimada de termino de estudios') }}"
                                value="{{ old('Duracion',$becado->Duracion) }}" required />
                            @if ($errors->has('Duracion'))
                            <span id="Duracion-error" class="error text-danger"
                                for="input-Duracion">{{ $errors->first('Duracion') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    {{ Form::label('subir foto del becado') }}

                    <input class="form-control" type="file" name="Foto_path" id="Foto_path" accept=".jpg,.png,.jpeg"
                        class="hidden">

                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    {{ Form::label('Dirección de la Universidad') }}
                    {{ Form::text('DireccionUni', $becado->DireccionUni, ['class' => 'form-control' . ($errors->has('DireccionUni') ? ' is-invalid' : ''), 'placeholder' => 'Dirección de la Universidad']) }}
                    {!! $errors->first('DireccionUni', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Banco') }}
                    {{ Form::text('Banco', $becado->Banco, ['class' => 'form-control' . ($errors->has('Banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
                    {!! $errors->first('Banco', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Cuenta Bancaria') }}
                    {{ Form::text('CuentaBanc', $becado->CuentaBanc, ['class' => 'form-control' . ($errors->has('CuentaBanc') ? ' is-invalid' : ''), 'placeholder' => 'Cuentabancaria']) }}
                    {!! $errors->first('CuentaBanc', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">

                {{ Form::label('Sistema') }}
                <select name="Sistema" id="Sistema" class="form-select" required>
                    @if(old('Sistema',$becado->Sistema==''))
                    <option selected disabled value="">Seleccionar Sistema</option>
                    <option value="{{'Bimestral'}}">{{"Bimestral"}}</option>
                    <option value="{{'Trimestral'}}">{{"Trimestral"}}</option>
                    <option value="{{'Cuatrimestral'}}">{{"Cuatrimestral"}}</option>
                    <option value="{{'Semestral'}}">{{"Semestral"}}</option>
                    @elseif(old('Sistema',$becado->Sistema=='Bimestral'))
                    <option selected value="{{'Bimestral'}}">{{"Bimestral"}}</option>
                    <option value="{{'Trimestral'}}">{{"Trimestral"}}</option>
                    <option value="{{'Cuatrimestral'}}">{{"Cuatrimestral"}}</option>
                    <option value="{{'Semestral'}}">{{"Semestral"}}</option>
                    @elseif(old('Sistema',$becado->Sistema=='Trimestral'))
                    <option value="{{'Bimestral'}}">{{"Bimestral"}}</option>
                    <option selected value="{{'Trimestral'}}">{{"Trimestral"}}</option>
                    <option value="{{'Cuatrimestral'}}">{{"Cuatrimestral"}}</option>
                    <option value="{{'Semestral'}}">{{"Semestral"}}</option>
                    @elseif(old('Sistema',$becado->Sistema=='Cuatrimestral'))
                    <option value="{{'Bimestral'}}">{{"Bimestral"}}</option>
                    <option value="{{'Trimestral'}}">{{"Trimestral"}}</option>
                    <option selected value="{{'Cuatrimestral'}}">{{"Cuatrimestral"}}</option>
                    <option value="{{'Semestral'}}">{{"Semestral"}}</option>
                    @elseif(old('Sistema',$becado->Sistema=='Semestral'))
                    <option value="{{'Bimestral'}}">{{"Bimestral"}}</option>
                    <option value="{{'Trimestral'}}">{{"Trimestral"}}</option>
                    <option value="{{'Cuatrimestral'}}">{{"Cuatrimestral"}}</option>
                    <option selected value="{{'Semestral'}}">{{"Semestral"}}</option>
                    @endif
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>

            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>{{ __('Fecha de inicio en la beca') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('Anoiniciobeca') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('Anoiniciobeca') ? ' is-invalid' : '' }}"
                                name="Anoiniciobeca" id="input-Anoiniciobeca" type="date"
                                placeholder="{{ __('Anoiniciobeca') }}"
                                value="{{ old('Anoiniciobeca',$becado->Anoiniciobeca) }}" required />
                            @if ($errors->has('Anoiniciobeca'))
                            <span id="Anoiniciobeca-error" class="error text-danger"
                                for="input-Anoiniciobeca">{{ $errors->first('Anoiniciobeca') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>{{ __('Fecha de Graduación.') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('AnodeGraduacion') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('AnodeGraduacion') ? ' is-invalid' : '' }}"
                                name="AnodeGraduacion" id="input-AnodeGraduacion" type="date"
                                placeholder="{{ __('AnodeGraduacion') }}"
                                value="{{ old('AnodeGraduacion',$becado->AnodeGraduacion) }}" />
                            @if ($errors->has('AnodeGraduacion'))
                            <span id="AnodeGraduacion-error" class="error text-danger"
                                for="input-AnodeGraduacion">{{ $errors->first('AnodeGraduacion') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>{{ __('Fecha de Baja en la beca') }}</label>
                    <div>
                        <div class="form-group{{ $errors->has('FechadeBaja') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('FechadeBaja') ? ' is-invalid' : '' }}"
                                name="FechadeBaja" id="input-FechadeBaja" type="date"
                                placeholder="{{ __('FechadeBaja') }}"
                                value="{{ old('FechadeBaja',$becado->FechadeBaja) }}" />
                            @if ($errors->has('FechadeBaja'))
                            <span id="FechadeBaja-error" class="error text-danger"
                                for="input-FechadeBaja">{{ $errors->first('FechadeBaja') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Logros recibidos') }}
                    {{ Form::text('Logros_recibidos', $becado->Logros_recibidos, ['class' => 'form-control' . ($errors->has('Logros_recibidos') ? ' is-invalid' : ''), 'placeholder' => 'Logros Recibidos']) }}
                    {!! $errors->first('Logros_recibidos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">

                {{ Form::label('status') }}

                <select name="status" id="status" class="form-select" required>
                    @if($becado->status=='')
                    <option selected disabled value="">Seleccionar status</option>
                    <option value="{{'Activo'}}">{{"Activo"}}</option>
                    <option value="{{'Baja'}}">{{"Baja"}}</option>
                    <option value="{{'Graduado'}}">{{"Graduado"}}</option>
                    @elseif($becado->status=='Activo')
                    <option selected value="{{'Activo'}}">{{"Activo"}}</option>
                    <option value="{{'Baja'}}">{{"Baja"}}</option>
                    <option value="{{'Graduado'}}">{{"Graduado"}}</option>
                    @elseif ($becado->status=='Baja')
                    <option value="{{'Activo'}}">{{"Activo"}}</option>
                    <option value="{{'Baja'}}" selected>{{"Baja"}}</option>
                    <option value="{{'Graduado'}}">{{"Graduado"}}</option>
                    @elseif ($becado->status=='Graduado')
                    <option value="{{'Activo'}}">{{"Activo"}}</option>
                    <option value="{{'Baja'}}">{{"Baja"}}</option>
                    <option value="{{'Graduado'}}" selected>{{"Graduado"}}</option>
                    @endif
                </select>

                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>

            <div class="col-sm-4">


                {{ Form::label('programa') }}
                <select name="programa_id" id="programa_id" class="form-select" required>
                    <option selected disabled value="">Seleccionar programa</option>
                    @foreach ($programas as $item)
                    @if($becado->programa_id=== $item->id)
                    <option value="{{ $item->id }}" selected>
                        {{ $item->nombre }}
                    </option>
                    @else
                    <option value="{{ $item->id }}">
                        {{ $item->nombre }}
                    </option>
                    @endif
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>

            </div>
            <div class=" col-sm-4">

                {{ Form::label('servicio') }}
                <select name="servicio_id" id="servicio_id" class="form-select" required>
                    <option selected disabled value="">Seleccionar servicio</option>
                    @foreach ($servicios as $item)
                    @if ($becado->servicio_id=== $item->id)
                    <option value="{{ $item->id }}" selected>
                        {{ $item->nombre }}
                    </option>
                    @else
                    <option value="{{ $item->id }}">
                        {{ $item->nombre }}
                    </option>
                    @endif
                    @endforeach
                </select>

                <div class="invalid-feedback">
                    Please select a valid state.
                </div>

            </div>


        </div>
        <div class="box-footer mt20">
            <br>
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </div>
    </div>
</div>
<style>
/* body {
    font-weight: bold;
} */
</style>