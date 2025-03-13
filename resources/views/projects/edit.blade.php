<!-- resources/views/projects/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto</title>
    <style> /*  <-  ¡AÑADE TODO ESTE BLOQUE <style>  */
        body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
        color: #333;
    }

    h1 {
        color: #333;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
        margin-bottom: 20px; /* Más espacio debajo del título */
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    /* Estilos para el formulario */
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Espacio debajo del formulario */
    }

    form div {
        margin-bottom: 15px; /* Espacio entre los elementos del formulario */
    }

    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="date"],
    form input[type="number"],
    form textarea,
    form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box; /*  Importante para que el padding no aumente el ancho total */
        font-size: 1em;
    }

    form textarea {
        height: 100px; /* Altura predeterminada para el textarea */
    }

    form select {
        appearance: none; /* Elimina estilos nativos del select en algunos navegadores */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Flecha desplegable */
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 5px;
        padding-right: 30px; /* Espacio para la flecha */
    }

    form select::-ms-expand {
        display: none; /* Ocultar flecha por defecto en IE/Edge */
    }


    form button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1.1em;
    }

    form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }
    </style>
</head>
<body>

    <h1>Editar Proyecto</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT') 

        <div>
            <label for="title">Título del Proyecto:</label> 
            <input type="text" id="title" name="title" value="{{ $project->title }}" required> 
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Descripción (Opcional):</label>
            <textarea id="description" name="description">{{ $project->description }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="start_date">Fecha de Inicio (Opcional):</label>
            <input type="date" id="start_date" name="start_date" value="{{ $project->start_date ? $project->start_date->format('Y-m-d') : '' }}">
            @error('start_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="end_date">Fecha de Fin (Opcional):</label>
            <input type="date" id="end_date" name="end_date" value="{{ $project->end_date ? $project->end_date->format('Y-m-d') : '' }}">
            @error('end_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Estado del Proyecto:</label>
            <select id="status" name="status" required>
                <option value="">Selecciona un estado</option>
                <option value="planning" {{ $project->status == 'planning' ? 'selected' : '' }}>Planificación</option>
                <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                <option value="on_hold" {{ $project->status == 'on_hold' ? 'selected' : '' }}>En Espera</option>
                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completado</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="owner_id">ID del Propietario (Usuario):</label>
            <input type="number" id="owner_id" name="owner_id" value="{{ $project->owner_id }}" required>
            <p>💡 Introduce el ID del usuario que será el propietario de este proyecto.</p>
            @error('owner_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Guardar Cambios</button>
    </form>

    <br>
    <a href="{{ route('projects.index') }}">Volver al Listado de Proyectos</a>

</body>
</html>
