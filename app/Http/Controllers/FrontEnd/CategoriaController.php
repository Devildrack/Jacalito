<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }
}
