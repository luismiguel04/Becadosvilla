<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Becado;
use App\Models\Programa;
use Carbon\Carbon;

use App\Models\Detallegasto;
use PhpParser\Node\Stmt\Return_;

/**
 * Class GastoController
 * @package App\Http\Controllers
 */

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::paginate();
        $becados = Becado::all();
        $detalle = Detallegasto::all();
        $programas = Programa::all();
        $total = $detalle->sum('Monto');


        return view('gasto.index', compact('gastos', 'becados', 'detalle', 'total', 'programas'))
            ->with('i', (request()->input('page', 1) - 1) * $gastos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $gasto = new Gasto();
        $detalle = new Detallegasto();
        $becados = Becado::all()->where('status', '=', 'Activo');
        $query = 0;
        $programas = Programa::all()->where('status', '=', 'activo');
        return view('gasto.create', compact('gasto', 'becados', 'detalle', 'programas', 'query'));
    }
    public function search(Request $request)
    {
        $gasto = new Gasto();
        $detalle = new Detallegasto();
        $query = trim($request->get('search'));
        $becados = Becado::all()->where('status', '=', 'Activo')->where('programa_id', '=', $query);
        $programas = Programa::all()->where('status', '=', 'activo');
        return view('gasto.create', compact('gasto', 'becados', 'detalle', 'programas', 'query'));
    }
    public function searche(Request $request)
    {

        $detalle = new Detallegasto();
        $query = trim($request->get('search'));
        $becados = Becado::all()->where('status', '=', 'Activo')->where('programa_id', '=', $query);
        $programas = Programa::all()->where('status', '=', 'activo');
        return view('gasto.edit', compact('becados', 'detalle', 'programas', 'query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $gasto = new Gasto();
        /*    $gasto = Gasto::create($request->all()); */
        $fecha = $request->get('fecha');
        $dia = Carbon::parse($fecha)->Format('Y-m-d');

        $gasto->fecha = $dia;
        $gasto->save();

        $becado_id = $request->get('becado_id');
        $Monto = $request->get('Monto');
        $cont = 0;

        while ($cont < count($becado_id)) {
            $detalle = new detallegasto();
            $detalle->gasto_id = $gasto->id;
            $detalle->becado_id =  json_decode($becado_id[$cont]);
            $detalle->Monto = json_decode($Monto[$cont]);
            $cont = $cont + 1;
            $detalle->save();
            $detalle->saveOrFail();
        }

        return redirect()->route('gastos.index')
            ->with('success', 'Gasto created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasto = Gasto::find($id);
        $becado = Becado::all();
        $detalle = Detallegasto::all()->where('gasto_id', '=', $id);
        $total = $detalle->sum('Monto');

        return view('gasto.show', compact('gasto', 'becado', 'detalle', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gasto::find($id);

        $detalle = Detallegasto::all()->where('gasto_id', '=', $id);
        $dato = $detalle->first();
        $query = $dato->becado->programa_id;
        $becados = Becado::all()->where('status', '=', 'Activo')->where('programa_id', '=', $query);
        $programas = Programa::all()->where('status', '=', 'activo');

        $total = $detalle->sum('Monto');

        return view('gasto.edit', compact('gasto', 'becados', 'detalle', 'programas', 'total', 'query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gasto $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {

        request()->validate(gasto::$rules);
        /*  $fecha = $request->get('fecha');
        $dia = Carbon::parse($request->get('fecha'))->Format('Y-m-d');
        $gasto->fecha = $dia; */
        /*     $gasto->update(['fecha' => $fecha]); */

        $gasto->update($request->all());
        /*    $gasto->update($gasto->fecha = Carbon::parse($request->get('fecha'))->Format('Y-m-d')); */




        $gasto = Gasto::find($gasto);
        $gasto = $request->get('gasto');
        $becado_id = $request->get('becado_id');
        $Monto = $request->get('Monto');
        $cont = 0;
        if ($cont > 0) {
            while ($cont < count($becado_id)) {
                $detalle = new detallegasto();
                $detalle->gasto_id = $gasto;
                $detalle->becado_id =  json_decode($becado_id[$cont]);
                $detalle->Monto = json_decode($Monto[$cont]);
                $cont = $cont + 1;
                $detalle->save();
                $detalle->saveOrFail();
            }
        }



        return redirect()->route('gastos.index')
            ->with('success', 'Gasto Actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gasto = Gasto::find($id)->delete();

        return redirect()->route('gastos.index')
            ->with('success', 'Gasto deleted successfully');
    }
}
