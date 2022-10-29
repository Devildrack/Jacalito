<?php

namespace App\Models;

use App\Enums\MesaEstado;
use App\Enums\MesaLocalizacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','numero_persona','estado', 'localizacion'];

    protected $casts = [
        'estado' => MesaEstado::class,
        'localizacion' => MesaLocalizacion::class
    ];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class);
    }
}
