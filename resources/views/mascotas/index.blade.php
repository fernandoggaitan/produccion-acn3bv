@extends('layouts.app-admin')

@section('title', 'Lista de mascotas')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mascotas') }}</div>

                    <div class="card-body">

                        @if (Session('status'))
                            <div class="alert alert-success"> {{ Session('status') }} </div>
                        @endif

                        <form action="{{ route('mascotas.index') }}" method="GET" class="mb-5 p-3 border-bottom">
                            <div class="mb-3">
                                <input type="text" name="buscador" class="form-control" placeholder="Buscar por nombre de mascota o teléfono" value="{{ $buscador }}">
                            </div>
                            <button type="submit" class="btn btn-success"> 
                                <i class="fa-solid fa-magnifying-glass"></i>
                                Buscar 
                            </button>
                            <a href="{{ route('mascotas.index') }}" class="btn btn-primary"> 
                                <i class="fa-solid fa-rotate-right"></i>
                                Limpiar búsqueda 
                            </a>
                        </form>

                        <div class="mb-3">
                            <a href="{{ route('mascotas.create') }}" class="btn btn-primary"> 
                                <i class="fa-solid fa-plus"></i>
                                Agregar mascota 
                            </a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Nombre </th>
                                    <th> Categoría </th>
                                    <th> Fecha de nacimiento </th>
                                    <th> Teléfono de contacto </th>
                                    <th> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mascotas->count() > 0)
                                    @foreach ($mascotas as $masc)
                                        <tr>
                                            <td> {{ $masc->nombre }} </td>
                                            <td> {{ $masc->categoria->nombre }} </td>
                                            <td> {{ $masc->fecha_nacimiento }} </td>
                                            <td> {{ $masc->telefono }} </td>
                                            <td> 
                                                <ul>
                                                    <li class="mb-3">
                                                        <a href="{{ asset('/storage/' . $masc->imagen) }}" target="_blank" class="btn btn-primary"> 
                                                            <i class="fa-solid fa-photo-film"></i>
                                                            Imagen
                                                        </a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a href="{{ route('mascotas.show', $masc) }}" class="btn btn-primary"> 
                                                            <i class="fa-solid fa-eye"></i>
                                                            Ingresar 
                                                        </a>
                                                    </li>
                                                </ul>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center"> No hay mascotas creadas </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{ $mascotas->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/admin/submit_eliminar_recurso.js'])

@endsection