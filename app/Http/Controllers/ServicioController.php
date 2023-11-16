<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $servicios = Servicio::where('is_visible', true)
            ->when(
                $request->buscador,
                function (Builder $builder) use ($request) {
                    $builder->where('nombre', 'like', "%{$request->buscador}%");
                }
            )
            ->where('is_visible', true)
            ->orderBy('nombre')
            ->paginate(10);
        return view('servicios.index', [
            'servicios' => $servicios,
            'buscador' => $request->buscador
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'numeric|max:9999999',
            'descripcion' => 'required',
        ]);

        Servicio::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);
        
        return redirect()
            ->route('servicios.index')
            ->with('status', 'El servicio se ha agregado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return $servicio;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        $servicio->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()
            ->route('servicios.index')
            ->with('status', 'El servicio se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //$mascota->delete();
        $servicio->update([
            'is_visible' => false,            
        ]);
        return redirect()
            ->route('servicios.index')
            ->with('status', 'El servicio se ha eliminado correctamente.');
    }
}
