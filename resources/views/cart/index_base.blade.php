@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (count($cart) > 0)
                    <div class="card mb-5">
                        <div class="card-header">{{ __('Carrito') }}</div>
                        <div class="card-body">
                            
                            @if (session('status'))
                                <div class="alert alert-success"> {{ session('status') }} </div>
                            @endif

                            <table class="table mb-5 border-bottom">
                                <thead>
                                    <tr>
                                        <th> Nombre </th>
                                        <th> Precio </th>
                                        <th colspan="2"> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key => $item)
                                        <tr>
                                            <td> {{ $item['nombre'] }} </td>
                                            <td> {{ $item['precio'] }} </td>
                                            <td>
                                                <form action="{{ route('cart.update', $key) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="1" name="cantidad" class="form-control" value="{{ $item['cantidad'] }}" />
                                                        <button class="btn btn-success" type="submit">Modificar cantidad</button>                                                        
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $key) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('servicios') }}</div>

                    <div class="card-body">

                        <form action="{{ route('cart.index') }}" method="GET" class="mb-5 p-3 border-bottom">
                            <div class="mb-3">
                                <input type="text" name="buscador" class="form-control"
                                    placeholder="Buscar por nombre de servicio o teléfono" value="{{ $buscador }}">
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                Buscar
                            </button>
                            <a href="{{ route('cart.index') }}" class="btn btn-primary">
                                <i class="fa-solid fa-rotate-right"></i>
                                Limpiar búsqueda
                            </a>
                        </form>

                        @foreach ($servicios as $item)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h2 class="card-title">{{ $item->nombre }}</h2>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Precio: ${{ $item->precio_format() }}
                                    </p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="codigo" value="{{ $item->id }}" />
                                        <input type="number" min="1" name="cantidad" max="100"
                                            class="form-control w-25 mb-3" placeholder="Ingrese la cantidad"
                                            value="1" />
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            Agregar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        {{ $servicios->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/admin/submit_eliminar_recurso.js'])

@endsection
