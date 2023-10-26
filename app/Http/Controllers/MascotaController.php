<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Categoria;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mascotas = Mascota::where('is_visible', true)
        ->when(
            $request->buscador,
            function (Builder $builder) use ($request) {
                $builder->where('nombre', 'like', "%{$request->buscador}%")
                    ->orWhere('telefono', 'like', "%{$request->buscador}%");
            }
        )
            ->orderBy('nombre')
            ->paginate(10);
        return view('mascotas.index', [
            'mascotas' => $mascotas,
            'buscador' => $request->buscador
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('mascotas.create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:50',
            'fecha_nacimiento' => 'required|date|before:tomorrow',
            'telefono' => 'required|max:50',
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|mimes:jpg,png'
        ], [
            'nombre.required' => 'El nombre de la mascota es obligatorio'
        ]);

        $imagen_nombre = $request->file('imagen')->getClientOriginalName();

        $imagen = $request->file('imagen')->storeAs('mascotas', $imagen_nombre, 'public');

        Mascota::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
            'imagen' => $imagen
        ]);
        return redirect()
            ->route('mascotas.index')
            ->with('status', 'La mascota se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', [
            'mascota' => $mascota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('mascotas.edit', [
            'categorias' => $categorias,
            'mascota' => $mascota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $mascota->update([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()
            ->route('mascotas.index')
            ->with('status', 'La mascota se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //$mascota->delete();
        $mascota->update([
            'is_visible' => false
        ]);
        return redirect()
            ->route('mascotas.index')
            ->with('status', 'La mascota se ha eliminado correctamente');
    }
}
