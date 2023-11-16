@extends('layouts.app-admin')

@section('title', $mascota->nombre)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $mascota->nombre }}</div>
                    <div class="card-body" style="min-height: 500px">
                        {{ $mascota->descripcion }}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mascotas.index') }}" class="btn btn-primary"> Volver a mascotas </a>
                        <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-success"> Editar </a>
                        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn_eliminar_recurso"> Eliminar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/admin/submit_eliminar_recurso.js'])

@endsection
