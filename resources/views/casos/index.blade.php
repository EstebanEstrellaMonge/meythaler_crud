@extends('layouts.app')

@section('title', 'Casos')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Casos</h1>
    <a href="{{ route('casos.create') }}" class="btn btn-primary">Nuevo Caso</a>
</div>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($casos as $caso)
        <tr>
            <td>{{ $caso->id }}</td>
            <td>{{ $caso->titulo }}</td>
            <td>{{ $caso->descripcion }}</td>
            <td>{{ ucfirst($caso->estado) }}</td>
            <td>{{ $caso->usuario->nombre }}</td>
            <td>
                <a href="{{ route('casos.edit', $caso->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('casos.destroy', $caso->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar caso?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
