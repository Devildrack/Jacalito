<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservacionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_completo' => ['required'],
            'email' => ['required', 'email'],
            'numero_telefonico' => ['required'],
            'fecha_reservacion' => ['required', 'date', new DateBetween, new TimeBetween],
            'mesa_id' => ['required'],
            'numero_persona' => ['required']
        ];
    }
}
