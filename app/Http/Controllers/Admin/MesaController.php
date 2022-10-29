<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MesaStoreRequest;
use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::all();
        return view('admin.mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesaStoreRequest $request)
    {
        Mesa::create([
            'nombre' => $request->nombre,
            'numero_persona' => $request->numero_persona,
            'estado' => $request->estado,
            'localizacion' => $request->localizacion,
        ]);

        return to_route('admin.mesas.index')->with('success', 'Mesa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        return view('admin.mesas.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MesaStoreRequest $request, Mesa $mesa)
    {
        $mesa->update($request->validated());

        return to_route('admin.mesas.index')->with('success', 'Mesa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        $mesa->reservaciones()->delete();
        $mesa->delete();

        return to_route('admin.mesas.index')->with('danger', 'Mesa eliminada exitosamente.');
    }
}
