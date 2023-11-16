<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $cart = $request->session()->get('cart', []);
        
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
        return view('cart.index', [
            'cart' => $cart,
            'servicios' => $servicios,
            'buscador' => $request->buscador
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recuperamos el servicio.
        $servicio = Servicio::find($request->codigo);
        //Verificamos que el id coincida con un servicio existente.
        if($servicio){

            //Recuperamos el carrito actual.
            $cart = $request->session()->get('cart', []);

            //Agregamos un ítem.
            $cart[$servicio->id] = [
                'precio' => $servicio->precio,		
                'nombre' => $servicio->nombre,
                'cantidad' => $request->cantidad,
            ];

            $request->session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('status', 'El servicio ha sido agregado al carrito');

        }else{
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
        
        //Recuperamos el carrito actual.
        $cart = $request->session()->get('cart', []);

        if( isset($cart[$id]) ){
            //Cambiamos la cantidad del ítem.
            $cart[$id]['cantidad'] = $request->cantidad;
            $request->session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('status', 'El servicio ha sido midificado en el carrito');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //Recuperamos el carrito actual.
        $cart = $request->session()->get('cart', []);
        if( isset($cart[$id]) ){
            //Cambiamos la cantidad del ítem.
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('status', 'El servicio ha sido eliminando del carrito');
        }else{
            return redirect()->back();
        }
    }
}
