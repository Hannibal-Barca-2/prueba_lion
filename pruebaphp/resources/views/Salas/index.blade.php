@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Salas') }}</div>

                <div class="card-body">
                <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($salas as $sala)
                            <tr>
                                <td>{{ $sala->id }}</td>
                                <td>{{ $sala->nombre }}</td>
                                <td>
                                <form>
                                <a class="btn btn-danger" href="{{ route('salas.eliminar', $sala->id) }}"><i class="fa-solid fa-trash"></i></a>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a class="button" href="{{ route('salas.crear') }}">Crear Sala</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection