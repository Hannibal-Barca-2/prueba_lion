@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Junta') }}</div>
                <div class="card-body">
                    <juntas-component
                        :array_salas="{{ $salas }}"
                    >
                    </juntas-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection