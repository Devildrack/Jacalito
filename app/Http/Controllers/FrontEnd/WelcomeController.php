<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $especiales = Categoria::where('nombre', 'especiales')->first();

        return view('welcome', compact('especiales'));
    }

    public function gracias()
    {
        return view('gracias');
    }

}
