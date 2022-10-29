<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','imagen','descripcion', 'precio'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_menu');
    }

}
