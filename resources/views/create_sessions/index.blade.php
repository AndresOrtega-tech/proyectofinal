<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sesiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Sesiones</h1>
        <a href="{{ route('create_sessions.create') }}" class="btn btn-primary mb-3">Crear Sesión</a>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sessions as $session)
                <tr>
                    <td>{{ $session->id }}</td>
                    <td>{{ $session->name }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($session->start_date)) }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($session->end_date)) }}</td>
                    <td>
                        @switch($session->status)
                            @case('scheduled')
                                <span class="badge bg-info">Programada</span>
                                @break
                            @case('active')
                                <span class="badge bg-success">Activa</span>
                                @break
                            @case('completed')
                                <span class="badge bg-primary">Completada</span>
                                @break
                            @case('cancelled')
                                <span class="badge bg-danger">Cancelada</span>
                                @break
                            @default
                                <span class="badge bg-secondary">{{ $session->status }}</span>
                        @endswitch
                    </td>
                    <td>
                        <a href="{{ route('create_sessions.show', $session->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('create_sessions.edit', $session->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('create_sessions.destroy', $session->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay sesiones registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>