<?php

namespace App\Enums;

enum MesaEstado: string
{
    case Disponible = 'disponible';
    case No_disponible = 'no_disponible';
    case Pendiente = 'pendiente';
}
