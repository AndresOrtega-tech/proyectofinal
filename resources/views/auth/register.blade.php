@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Cuenta</h1>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <!-- Correo -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <!-- Nombre -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Botón de registro -->
        <button type="submit" class="btn btn-primary">Registrar</button>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
@endsection