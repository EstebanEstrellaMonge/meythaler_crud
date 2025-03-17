@extends('layouts.app')

@section('title', 'Editar Caso')

@section('content')
<h1>Editar Caso</h1>

<form action="{{ route('casos.update', $caso->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $caso->titulo }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" required>{{ $caso->descripcion }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-control">
            <option value="abierto" {{ $caso->estado == 'abierto' ? 'selected' : '' }}>Abierto</option>
            <option value="en proceso" {{ $caso->estado == 'en proceso' ? 'selected' : '' }}>En Proceso</option>
            <option value="cerrado" {{ $caso->estado == 'cerrado' ? 'selected' : '' }}>Cerrado</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Usuario</label>
        <select name="usuario_id" class="form-control">
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $caso->usuario_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('casos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
