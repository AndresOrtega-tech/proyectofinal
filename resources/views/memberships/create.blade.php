@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Membresía</h1>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario para crear membresías -->
    <form action="{{ route('memberships.store') }}" method="POST">
        @csrf <!-- Token de seguridad obligatorio en formularios -->

        <!-- Usuario -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Proyecto -->
        <div class="mb-3">
            <label for="project_id" class="form-label">Proyecto</label>
            <select name="project_id" id="project_id" class="form-control" required>
                <option value="">Seleccione un proyecto</option>
                @foreach($projects as $project)
                    <option value="{{ $project->project_id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Rol -->
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Fecha de ingreso -->
        <div class="mb-3">
            <label for="joined_at" class="form-label">Fecha de Ingreso</label>
            <input type="datetime-local" name="joined_at" id="joined_at" class="form-control" value="{{ old('joined_at') }}">
            @error('joined_at')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Crear Membresía</button>
    </form>
</div>
@endsection