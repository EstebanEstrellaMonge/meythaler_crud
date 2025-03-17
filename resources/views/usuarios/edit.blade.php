@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h1>Editar Usuario</h1>

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo Electrónico</label>
        <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Creación</label>
        <input type="date" name="created_at" class="form-control" >
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Actualización</label>
        <input type="date" name="update_at" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
