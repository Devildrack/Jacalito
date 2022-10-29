<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'email',
        'numero_telefonico',
        'fecha_reservacion',
        'mesa_id',
        'numero_persona',
    ];

    protected $dates = [
        'fecha_reservacion',
    ];


    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
