<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    //Acá se van a listar las categorías
    public function index()
    {
        $categorias = Categoria::get();
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    //Agregar una categoría nueva.
    public function store()
    {

    }

}