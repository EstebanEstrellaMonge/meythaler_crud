@extends('layouts.app')

@section('title', 'Crear Caso')

@section('content')
<h1>Crear Caso</h1>

<form action="{{ route('casos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" name="descripcion" class="form-control" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
            <option value="">Seleccionar estado</option>
            <option value="abierto">abierto</option>
            <option value="en proceso">en proceso</option>
            <option value="cerrado">cerrado</option>
        </select>
</div>
    <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo Facturacion</label>
        <input type="text" name="facturacion" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('casos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
