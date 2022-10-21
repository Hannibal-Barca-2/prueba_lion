@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Juntas') }}</div>

                <div class="card-body">
                    <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
                        <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora Fin</th>
                            <th scope="col">Cancelar</th>
                        </thead>
                        <tbody>
                            @foreach ($juntas as $junta)
                                <tr>
                                    <td>{{ $junta->id }}</td>
                                    <td>{{ $junta->nombre }}</td>
                                    <td>{{ $junta->horaInicio }}</td>
                                    <td>{{ $junta->horaFin }}</td>
                                    <td>
                                    <form>
                                    <a class="btn btn-danger" href="route('juntas.destroy')"><i class="fa-solid fa-trash"></i></a>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="button" href="{{ route('juntas.crear') }}">Crear Junta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
