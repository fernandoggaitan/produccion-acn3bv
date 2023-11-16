@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('servicios.update', $servicio) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">{{ $servicio->nombre }}</div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif                            

                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre de la servicio" value="{{ $servicio->nombre }}">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label"> Precio </label>
                                <input type="number" class="form-control" id="precio" name="precio"
                                    placeholder="Ingrese el nombre de la servicio" value="{{ $servicio->precio }}">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"> Descripción </label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"
                                    placeholder="Ingrese la descripción del producto">{{ $servicio->descripcion }}</textarea>
                            </div>                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Modificar </button>
                            <a href="{{ route('servicios.index') }}" class="btn btn-danger"> Cancelar </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
