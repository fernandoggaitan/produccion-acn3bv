<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    //Acá se van a listar las categorías
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    //Agregar una categoría nueva.
    public function store(Request $request)
    {
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);
        //return "Se ha registrado una categoría con el id: {$categoria->id}";
        return redirect()->route('categorias.index');
    }

}