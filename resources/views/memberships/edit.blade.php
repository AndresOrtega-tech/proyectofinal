@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Membresía</h1>

    <!-- Formulario para editar la membresía -->
    <form action="{{ route('memberships.update', $membership->membership_id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método HTTP PUT para actualizar -->

        <!-- Usuario -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $membership->user_id }}" required>
        </div>

        <!-- Proyecto -->
        <div class="mb-3">
            <label for="project_id" class="form-label">Proyecto</label>
            <input type="number" name="project_id" id="project_id" class="form-control" value="{{ $membership->project_id }}" required>
        </div>

        <!-- Rol -->
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ $membership->role }}">
        </div>

        <!-- Fecha de ingreso -->
        <div class="mb-3">
            <label for="joined_at" class="form-label">Fecha de Ingreso</label>
            <input type="datetime-local" name="joined_at" id="joined_at" class="form-control" value="{{ $membership->joined_at }}">
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Actualizar Membresía</button>
    </form>
</div>
@endsection