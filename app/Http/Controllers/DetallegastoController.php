<?php

namespace App\Http\Controllers;

use App\Models\Detallegasto;
use Illuminate\Http\Request;

/**
 * Class DetallegastoController
 * @package App\Http\Controllers
 */
class DetallegastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallegastos = Detallegasto::paginate();

        return view('detallegasto.index', compact('detallegastos'))
            ->with('i', (request()->input('page', 1) - 1) * $detallegastos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallegasto = new Detallegasto();
        return view('detallegasto.create', compact('detallegasto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Detallegasto::$rules);

        $detallegasto = Detallegasto::create($request->all());

        return redirect()->route('detallegastos.index')
            ->with('success', 'Detallegasto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallegasto = Detallegasto::find($id);

        return view('detallegasto.show', compact('detallegasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallegasto = Detallegasto::find($id);

        return view('detallegasto.edit', compact('detallegasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Detallegasto $detallegasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detallegasto $detallegasto)
    {
        request()->validate(Detallegasto::$rules);

        $detallegasto->update($request->all());

        return redirect()->route('detallegastos.index')
            ->with('success', 'Detallegasto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallegasto = Detallegasto::find($id)->delete();

        /*   return redirect()->route('detallegastos.index') */

        return back()
            ->with('success', 'Detallegasto deleted successfully');
    }
}
