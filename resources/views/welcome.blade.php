/c:/Users/andre/Desktop/IDS/RED_SOCIAL_PROYECTOS_COLABORATIVOS_v2/redSocialProyectos/resources/views/welcome.blade.php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social de Proyectos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md text-center">
            <h1 class="text-4xl font-bold text-gray-900">Red Social de Proyectos</h1>
            <p class="mt-2 text-gray-600">Colabora en proyectos y gestiona tareas de manera eficiente</p>
            <div class="mt-8 space-y-4">
                @auth
                    <a href="{{ route('projects.index') }}" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Ir a Proyectos
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-gray-50 border-indigo-600">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register.create') }}" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-gray-50 border-indigo-600">
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>