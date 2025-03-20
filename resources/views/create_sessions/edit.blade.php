<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Sesión</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('create_sessions.update', $create_session->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $create_session->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $create_session->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="start_date" class="form-label">Fecha de Inicio</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', date('Y-m-d\TH:i', strtotime($create_session->start_date))) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="end_date" class="form-label">Fecha de Finalización</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', date('Y-m-d\TH:i', strtotime($create_session->end_date))) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="scheduled" {{ old('status', $create_session->status) == 'scheduled' ? 'selected' : '' }}>Programada</option>
                    <option value="active" {{ old('status', $create_session->status) == 'active' ? 'selected' : '' }}>Activa</option>
                    <option value="completed" {{ old('status', $create_session->status) == 'completed' ? 'selected' : '' }}>Completada</option>
                    <option value="cancelled" {{ old('status', $create_session->status) == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('create_sessions.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>