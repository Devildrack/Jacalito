<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\MesaEstado;
use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Models\Reservacion;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    function stepOne(Request $request)
    {
        $reservaciones = $request->session()->get('reservaciones');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservaciones.step-one', compact('reservaciones', 'min_date', 'max_date'));
    }

    function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'nombre_completo' => ['required'],
            'email' => ['required', 'email'],
            'numero_telefonico' => ['required'],
            'fecha_reservacion' => ['required', 'date', new DateBetween, new TimeBetween],
            'numero_persona' => ['required'],
        ]);

        if (empty($request->session()->get('reservaciones'))) {
            $reservaciones = new Reservacion();
            $reservaciones->fill($validated);
            $request->session()->put('reservaciones', $reservaciones);
        } else {
            $reservaciones = $request->session()->get('reservaciones');
            $reservaciones->fill($validated);
            $request->session()->put('reservaciones', $reservaciones);
        }

        return to_route('reservaciones.step.two');
    }

    function stepTwo(Request $request)
    {
        $reservaciones = $request->session()->get('reservaciones');
        $reservacion_mesa = Reservacion::orderBy('fecha_reservacion')->get()->filter(function ($value) use ($reservaciones) {
            return $value->fecha_reservacion->format('Y-m-d') == $reservaciones->fecha_reservacion->format('Y-m-d');
        })->pluck('mesa_id');
        $mesas = Mesa::where('estado', MesaEstado::Disponible)->where('numero_persona', '>=', $reservaciones->numero_persona)
            ->whereNotIn('id', $reservacion_mesa)->get();
        return view('reservaciones.step-two', compact('reservaciones', 'mesas'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'mesa_id' => ['required'],
        ]);
        $reservaciones = $request->session()->get('reservaciones');
        $reservaciones->fill($validated);
        $reservaciones->save();
        $request->session()->forget('reservaciones');

        return to_route('gracias');
    }
}
