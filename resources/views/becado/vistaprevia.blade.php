@extends('layouts.app')
@section('content')

<section>

    <div class="modal fade" id="#vistaprevia{{ $documento->Foto_path }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <iframe src="http://localhost/becadosvilla/storage/app/documentos/{{$documento->Foto_path}}"
                        &embedded=true" style="width:100%; height:700px;" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection