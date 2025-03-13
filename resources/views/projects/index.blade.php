<!-- resources/views/projects/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proyectos</title>
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
        }

        h2 {
            color: #555;
            margin-top: 20px;
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

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <h1>Listado de Proyectos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('projects.create') }}">Crear Nuevo Proyecto</a>
    <br><br>

    @if ($projects->isEmpty())
        <p>No hay proyectos disponibles.</p>
    @else
        <ul>
            @foreach ($projects as $project)
                <li>
                    <h2>{{ $project->name }}</h2> 
                    <p>{{ $project->description }}</p>
                    <p>Estado: {{ $project->status }}</p>
                    <p>Propietario (ID de Usuario): {{ $project->owner_id }}</p>
                    <a href="{{ route('projects.edit', $project) }}">Editar</a>  
                    <hr>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
