<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MesaEstado;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservacionStoreRequest;
use App\Models\Mesa;
use App\Models\Reservacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaciones = Reservacion::all();
        return view('admin.reservaciones.index', compact('reservaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = Mesa::where('estado', MesaEstado::Disponible)->get();
        return view('admin.reservaciones.create', compact('mesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservacionStoreRequest $request)
    {
        $mesa = Mesa::findOrFail($request->mesa_id);
        if($request->numero_persona > $mesa->numero_persona){

            return back()->with('warning', 'Por favor ingrese el numero de personas que tiene disponible la mesa');
        }

        return to_route('admin.reservaciones.index')->with('success', 'Reservacion creada exitosamente.');
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
    public function edit(Reservacion $reservacione)
    {
        $mesas = Mesa::where('estado', MesaEstado::Disponible)->get();
        return view('admin.reservaciones.edit', compact('reservacione', 'mesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservacionStoreRequest $request, Reservacion $reservacione)
    {
        $mesa = Mesa::findOrFail($request->mesa_id);
        if($request->numero_persona > $mesa->numero_persona){

            return back()->with('warning', 'Por favor ingrese el numero de personas que tiene disponible la mesa');
        }

        $reservacione->update($request->validated());

        return to_route('admin.reservaciones.index')->with('success', 'Reservacion actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservacion $reservacione)
    {
        $reservacione->delete();

        return to_route('admin.reservaciones.index')->with('danger', 'Reservacion eliminada exitosamente.');
    }
}
