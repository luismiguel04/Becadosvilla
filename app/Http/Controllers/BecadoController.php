<?php

namespace App\Http\Controllers;


use DB;
use App\Models\Becado;
use App\Models\Programa;
use App\Models\Servicio;
use App\Models\Detallegasto;

use App\Models\documentos;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


/**
 * Class BecadoController
 * @package App\Http\Controllers
 */



class BecadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function filtro(Request $request)
    {
        $filtro = $request->filtro;
        $becados = Becado::with('programas')
            ->whereHas(
                'programas',
                function ($query) use ($filtro) {
                    if ($filtro) {
                        return $query->where('nombre', $filtro);
                    }
                }
            )->paginate(3);
        return view('becado.index', compact('becados'))
            ->with('i', (request()->input('page', 1) - 1) * $becados->perPage());
    }

    public function index()
    {
        $becados = Becado::all();

        $date = date('Y-m-d');

        $fechaa = Carbon::parse($date);
        //$becadosc = Becado::all()->groupBy('status')->count();
        $becadost = Becado::pluck('status')->count();
        $i = 0;
        $estatus = [
            "Activo",
            "Baja",
            "Graduado"
        ];
        $becadosc = Becado::select('status', Becado::raw('count(*) as total'))

            ->groupBy('status')
            ->get();




        return view('becado.index', compact('becados', 'fechaa', 'becadost', 'becadosc', 'i', 'estatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $becado = new Becado();
        $programas = programa::all()->where('status', '=', 'activo');
        $servicios = Servicio::all()->where('status', '=', 'activo');

        return view('becado.create', compact('becado', 'programas', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Becado::$rules);

        $becado = Becado::create($request->all());

        $Foto = $request->file('Foto_path');
        if ($Foto) {
            $Foto_path = time() . $Foto->getClientOriginalName();
            \Storage::disk('images')->put(
                $Foto_path,
                \File::get($Foto)
            );
            $becado->Foto_path = $Foto_path;
        }

        $becado->save();

        return redirect()->route('becados.index')
            ->with('success', 'Becado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $becado = Becado::find($id);

        $documentos = documentos::all()->where('becado_id', '=', $id);


        $i = 0;

        $registros = Detallegasto::join('gastos', 'gastos.id', '=', 'detallegastos.gasto_id')
            ->where('detallegastos.becado_id', $id)
            ->select('monto', DB::raw('MONTH(fecha) as mes'), DB::raw('YEAR(fecha) as ano'))
            ->distinct()
            ->orderBy('gastos.fecha', 'asc')
            ->get();

        $datos = [];
        $totalesAnuales = [];
        $total = 0;
        $colt = 0;

        foreach ($registros as $registro) {
            $mes = $registro->mes;
            $ano = $registro->ano;
            $monto = $registro->monto;

            // Agregar el monto al mes y año correspondiente en el array de datos
            $datos[$ano][$mes] = $monto;
            if (!isset($totalesAnuales[$ano])) {
                $totalesAnuales[$ano] = 0;
            }
            $totalesAnuales[$ano] += $monto;
            $total += $registro->monto;
        }


        return view('becado.show', compact('becado', 'documentos', 'i', 'datos', 'totalesAnuales', 'colt', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $becado = Becado::find($id);
        $programas = programa::all()->where('status', '=', 'activo');
        $servicios = Servicio::all()->where('status', '=', 'activo');

        return view('becado.edit', compact('becado', 'programas', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Becado $becado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Becado $becado)
    {
        request()->validate(Becado::$rules);

        $becado->update($request->all());
        $Foto = $request->file('Foto_path');
        if ($Foto) {
            $Foto_path = time() . $Foto->getClientOriginalName();
            \Storage::disk('images')->put(
                $Foto_path,
                \File::get($Foto)
            );
            $becado->Foto_path = $Foto_path;
        }

        $becado->save();

        return redirect()->route('becados.show', $becado->id)
            ->with('success', 'Becado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $becado = Becado::find($id)->delete();

        return redirect()->route('becados.index')
            ->with('success', 'Becado deleted successfully');
    }
    public function imprimir()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $becados = Becado::all();

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('becado.pdf', compact('becados'))
            ->setPaper('a3', 'landscape');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('becados.pdf');
    }
}
