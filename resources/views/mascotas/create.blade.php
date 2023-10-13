@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mascotas') }}</div>

                    <div class="card-body">

                        <form action="{{ route('mascotas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre de la mascota">
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label"> Fecha de nacimiento </label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label"> Teléfono de contacto </label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ingrese el teléfono de contacto">
                            </div>
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label"> Categoría </label>
                                <select class="form-control" name="categoria_id" id="categoria_id">
                                    <option value=""> Por favor seleccione la categoría de la mascota </option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"> Descripción </label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"
                                    placeholder="Ingrese la descripción del producto"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success"> Agregar </button>
                            <a href="{{ route('mascotas.index') }}" class="btn btn-danger"> Cancelar </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection