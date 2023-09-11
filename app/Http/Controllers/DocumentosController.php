<?php

namespace App\Http\Controllers;

use App\Models\Becado;
use App\Models\documentos;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class DocumentosController extends Controller
{

    public function create()
    {
        $documento = new documentos();
        $becado = Becado::all();


        return view('documentos.create', compact('documento', 'becado'));
    }

    public function stores(Request $request)
    {
        request()->validate(documentos::$rules);





        $files = $request->file('Foto_path');
        if ($request->hasFile('Foto_path')) {

            foreach ($files as $file) {
                $becado = documentos::create($request->all());
                $Foto_path = time() . '.' . $file->getClientOriginalExtension();
                $Foto_name = $file->getClientOriginalName();
                \Storage::disk('documentos')->put(
                    $Foto_path,
                    \File::get($file)
                );
                $becado->Foto_path = $Foto_path;
                $becado->nombre = $Foto_name;
                $becado->save();
            }



            return redirect()->route('becados.index')
                ->with('success', 'Documento subido correctamente.');
        } else {

            return back();
        }
    }
}
