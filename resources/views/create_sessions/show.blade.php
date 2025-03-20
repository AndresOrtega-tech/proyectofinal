<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles de la Sesión</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $create_session->name }}</h5>
                <p class="card-text"><strong>Descripción:</strong> {{ $create_session->description }}</p>
                <p class="card-text"><strong>Fecha de Inicio:</strong> {{ date('d/m/Y H:i', strtotime($create_session->start_date)) }}</p>
                <p class="card-text"><strong>Fecha de Finalización:</strong> {{ date('d/m/Y H:i', strtotime($create_session->end_date)) }}</p>
                <p class="card-text"><strong>Estado:</strong> 
                    @switch($create_session->status)
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
                            <span class="badge bg-secondary">{{ $create_session->status }}</span>
                    @endswitch
                </p>
                
                <a href="{{ route('create_sessions.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('create_sessions.edit', $create_session->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('create_sessions.destroy', $create_session->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>