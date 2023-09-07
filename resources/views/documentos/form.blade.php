<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('becado') }}
            <select name="becado_id" id="becado_id" class="form-control">
                <option>Seleccionar becado</option>
                @foreach ($becado as $item)
                <option value="{{ $item->id }}" @if($documento->becado_id=== $item->id) " selected='selected'
                    @endif>{{ $item->nombre.' ' .$item->ApellidoP.' '.$item->ApellidoM }}</option>
                </option>
                @endforeach

            </select>


        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Seleciona los documentos del becado</label>
            <input class="form-control" type="file" name="Foto_path[]" id="Foto_path" multiple required>
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>


</div>

</div>