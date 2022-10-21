@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Sala') }}</div>
                <div class="card-body">
                    <form action="{{ route('salas.guardar') }}" method="POST">
                    @csrf
                    <p>
                    Nombre:
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        class="form-control"
                    />
                    </p>
                    <button class="button" type="submit">Crear</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection