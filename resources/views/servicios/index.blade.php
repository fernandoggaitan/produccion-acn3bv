@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('servicios') }}</div>

                <div class="card-body">
                    
                    @if ( session('status') )
                        <div class="alert alert-success"> {{ session('status') }} </div>                        
                    @endif

                    <form action="{{ route('servicios.index') }}" method="GET" class="mb-5 p-3 border-bottom">
                        <div class="mb-3">
                            <input type="text" name="buscador" class="form-control" placeholder="Buscar por nombre de servicio o teléfono" value="{{ $buscador }}">
                        </div>
                        <button type="submit" class="btn btn-success"> 
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Buscar 
                        </button>
                        <a href="{{ route('servicios.index') }}" class="btn btn-primary"> 
                            <i class="fa-solid fa-rotate-right"></i>
                            Limpiar búsqueda 
                        </a>
                    </form>

                    <div class="mb-3">
                        <a href="{{ route('servicios.create') }}" class="btn btn-success"> 
                            <i class="fa-solid fa-pencil"></i>
                            Agregar servicio 
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th> Nombre </th>
                                <th> Precio </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($servicios->count() > 0)
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td> {{ $servicio->nombre }} </td>
                                        <td> ${{ $servicio->precio_format() }} </td>
                                        <td>
                                            <ul>
                                                <li class="mb-1">
                                                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-primary"> 
                                                        <i class="fa-solid fa-pencil"></i>
                                                        Editar
                                                    </a>
                                                </li>
                                                <li class="mb-1">
                                                    <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn_eliminar_recurso" type="submit"> 
                                                            <i class="fa-solid fa-trash"></i>
                                                            Eliminar 
                                                        </button>
                                                    </form>
                                                </li>                                                
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center"> No hay servicios cargadas </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{ $servicios->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/admin/submit_eliminar_recurso.js'])

@endsection
