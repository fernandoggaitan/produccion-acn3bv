@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Categorías') }}</div>

                    <div class="card-body">

                        <ul>
                            @foreach ($categorias as $item)
                                <li> {{ $item->nombre }} </li>
                            @endforeach
                        </ul>

                        <hr>

                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la categoría">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción de la categoría" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success"> Agregar </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
