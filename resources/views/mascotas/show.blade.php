@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $mascota->nombre }}</div>
                    <div class="card-body">
                        {{ $mascota->descripcion }}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mascotas.index') }}" class="btn btn-primary"> Volver a mascotas </a>
                        <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-success"> Editar </a>
                        <a href="" class="btn btn-danger"> Eliminar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/mascotas/show.js"></script>

    @vite(['resources/js/mascotas/show.js'])

@endsection
