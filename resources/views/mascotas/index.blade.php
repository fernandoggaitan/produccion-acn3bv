@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mascotas') }}</div>

                    <div class="card-body">

                        <a href="{{ route('mascotas.create') }}" class="btn btn-primary"> Agregar mascota </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Nombre </th>
                                    <th> Categoría </th>
                                    <th> Fecha de nacimiento </th>
                                    <th> Teléfono de contacto </th>
                                    <th>  </th>
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
                                                <a href="{{ route('mascotas.show', $masc) }}" class="btn btn-primary"> Ingresar </a>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection